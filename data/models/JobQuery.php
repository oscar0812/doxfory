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

     public function orderByMoneyAmount()
     {
         return $this->joinWith('Job.JobPayment')->orderBy('JobPayment.MoneyAmount');
     }

     public function orderByPaymentType()
     {
         return $this->joinWith('Job.JobPayment')->orderBy('JobPayment.IsBarter');
     }

     public static function orderByProximity($lat, $lon)
     {
         $sf = M_PI / 180; // scaling factor

         $con = Propel::getWriteConnection(\Map\JobTableMap::DATABASE_NAME);
         // dist = acos[ sin(lat1)*sin(lat2)+cos(lat1)*cos(lat2)*cos(lng1-lng2) ]
         $sql = "SELECT * FROM job
         ORDER BY ACOS(SIN(latitude*$sf)*SIN($lat*$sf) + COS(latitude*$sf)*COS($lat*$sf)*COS((longitude-$lon)*$sf))";

         $stmt = $con->prepare($sql);
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
     public static function getJobOrder($get)
     {
         $jobs = JobQuery::create()->notCompleted()->newestToOldest()->find();
         if (isset($get['order'])) {
             switch ($get['order']) {
           case 'proximity':
             $jobs = JobQuery::orderByProximity(26, -98);
           break;

           case 'title':
             $jobs = JobQuery::create()->orderByTitle();
           break;

           case 'description':
             $jobs = JobQuery::create()->orderByDescription();
           break;

           case 'price':
             $jobs = JobQuery::create()->orderByMoneyAmount();
           break;

           case 'payment':
             $jobs = JobQuery::create()->orderByPaymentType();
           break;
         }
         }
         return $jobs;
     }
 }
