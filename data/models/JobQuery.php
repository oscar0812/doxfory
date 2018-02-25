<?php

use Base\JobQuery as BaseJobQuery;

use Propel\Runtime\Propel;
use Propel\Runtime\Formatter\ObjectFormatter;
use Map\JobTableMap;

/**
 * Skeleton subclass for performing query and update operations on the 'job' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
 use Propel\Runtime\ActiveQuery\Criteria;

 class JobQuery extends BaseJobQuery
 {
     public function completed()
     {
         return $this->filterByIsCompleted('yes');
     }

     public function notCompleted()
     {
         return $this->filterByIsCompleted('no');
     }

     public function newestToOldest()
     {
         return $this->orderByTimePosted(Criteria::DESC);
     }

     public function orderByMoneyAmount($sort = 'asc')
     {
         return $this->joinWith('Job.JobPayment')->orderBy('JobPayment.MoneyAmount', $sort);
     }

     public function orderByPaymentType($sort = 'asc')
     {
         return $this->joinWith('Job.JobPayment')->orderBy('JobPayment.IsBarter', $sort);
     }

     public static function orderByProximity($lat, $lon, $sort = 'ASC')
     {
         $sort = strtoupper($sort);
         if ($sort != 'ASC' && $sort != 'DESC') {
             // avoid SQL injection
             $sort = 'ASC';
         }
         $sf = M_PI / 180; // scaling factor

         $con = Propel::getWriteConnection(\Map\JobTableMap::DATABASE_NAME);
         // dist = acos[ sin(lat1)*sin(lat2)+cos(lat1)*cos(lat2)*cos(lng1-lng2) ]
         $sql = "SELECT * FROM job
         ORDER BY ACOS(SIN(latitude*$sf)*SIN(:lat*$sf) +
         COS(latitude*$sf)*COS(:lat*$sf)*COS((longitude-:lon)*$sf)) $sort";

         $stmt = $con->prepare($sql);
         $stmt->bindParam(':lat', $lat);
         $stmt->bindParam(':lon', $lon);
         $stmt->execute();

         $formatter = new ObjectFormatter();
         $formatter->setClass('\Job'); //full qualified class name
         $jobs = $formatter->format($con->getDataFetcher($stmt));
         return $jobs;
     }

     // helper function for /jobs/all
     // return a list of jobs in a particular order
     // depending on the get request and 'order' param
     // $get['order'] will be proximity, title, description, price or payment
     public static function allJobsOrder($get)
     {
         $sort = 'asc';
         if (isset($get['sort'])) {
             $sort = strtolower($get['sort']);
             if ($sort != 'asc' && $sort != 'desc') {
                 $sort = 'asc';
             }
         }
         // by default, $jobs = all non complete jobs from newest to oldest
         $jobs = JobQuery::create()->notCompleted()->newestToOldest()->find();
         if (isset($get['order'])) {
             switch ($get['order']) {
           case 'date':
             $jobs = JobQuery::create()->orderByTimePosted($sort)->find();
           break;
           case 'proximity':
             $jobs = JobQuery::orderByProximity(26, -98, $sort);
           break;

           case 'title':
             $jobs = JobQuery::create()->orderByTitle($sort)->find();
           break;

           case 'description':
             $jobs = JobQuery::create()->orderByDescription($sort)->find();
           break;

           case 'price':
             $jobs = JobQuery::create()->orderByMoneyAmount($sort)->find();
           break;

           case 'payment':
             $jobs = JobQuery::create()->orderByPaymentType($sort)->find();
           break;
         }
         }
         return $jobs;
     }
 }
