<?php

namespace Map;

use \JobPayment;
use \JobPaymentQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'job_payment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class JobPaymentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.JobPaymentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'job_payment';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\JobPayment';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'JobPayment';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the job_id field
     */
    const COL_JOB_ID = 'job_payment.job_id';

    /**
     * the column name for the money_amount field
     */
    const COL_MONEY_AMOUNT = 'job_payment.money_amount';

    /**
     * the column name for the is_online_pay field
     */
    const COL_IS_ONLINE_PAY = 'job_payment.is_online_pay';

    /**
     * the column name for the is_in_person_pay field
     */
    const COL_IS_IN_PERSON_PAY = 'job_payment.is_in_person_pay';

    /**
     * the column name for the is_barter field
     */
    const COL_IS_BARTER = 'job_payment.is_barter';

    /**
     * the column name for the barter_item field
     */
    const COL_BARTER_ITEM = 'job_payment.barter_item';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('JobId', 'MoneyAmount', 'IsOnlinePay', 'IsInPersonPay', 'IsBarter', 'BarterItem', ),
        self::TYPE_CAMELNAME     => array('jobId', 'moneyAmount', 'isOnlinePay', 'isInPersonPay', 'isBarter', 'barterItem', ),
        self::TYPE_COLNAME       => array(JobPaymentTableMap::COL_JOB_ID, JobPaymentTableMap::COL_MONEY_AMOUNT, JobPaymentTableMap::COL_IS_ONLINE_PAY, JobPaymentTableMap::COL_IS_IN_PERSON_PAY, JobPaymentTableMap::COL_IS_BARTER, JobPaymentTableMap::COL_BARTER_ITEM, ),
        self::TYPE_FIELDNAME     => array('job_id', 'money_amount', 'is_online_pay', 'is_in_person_pay', 'is_barter', 'barter_item', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('JobId' => 0, 'MoneyAmount' => 1, 'IsOnlinePay' => 2, 'IsInPersonPay' => 3, 'IsBarter' => 4, 'BarterItem' => 5, ),
        self::TYPE_CAMELNAME     => array('jobId' => 0, 'moneyAmount' => 1, 'isOnlinePay' => 2, 'isInPersonPay' => 3, 'isBarter' => 4, 'barterItem' => 5, ),
        self::TYPE_COLNAME       => array(JobPaymentTableMap::COL_JOB_ID => 0, JobPaymentTableMap::COL_MONEY_AMOUNT => 1, JobPaymentTableMap::COL_IS_ONLINE_PAY => 2, JobPaymentTableMap::COL_IS_IN_PERSON_PAY => 3, JobPaymentTableMap::COL_IS_BARTER => 4, JobPaymentTableMap::COL_BARTER_ITEM => 5, ),
        self::TYPE_FIELDNAME     => array('job_id' => 0, 'money_amount' => 1, 'is_online_pay' => 2, 'is_in_person_pay' => 3, 'is_barter' => 4, 'barter_item' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('job_payment');
        $this->setPhpName('JobPayment');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\JobPayment');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('job_id', 'JobId', 'INTEGER' , 'job', 'id', true, null, null);
        $this->addColumn('money_amount', 'MoneyAmount', 'DOUBLE', true, 8, null);
        $this->addColumn('is_online_pay', 'IsOnlinePay', 'BOOLEAN', true, 1, false);
        $this->addColumn('is_in_person_pay', 'IsInPersonPay', 'BOOLEAN', true, 1, false);
        $this->addColumn('is_barter', 'IsBarter', 'BOOLEAN', true, 1, false);
        $this->addColumn('barter_item', 'BarterItem', 'VARCHAR', true, 32, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Job', '\\Job', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':job_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JobId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JobId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JobId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JobId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JobId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JobId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('JobId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? JobPaymentTableMap::CLASS_DEFAULT : JobPaymentTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (JobPayment object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = JobPaymentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = JobPaymentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + JobPaymentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JobPaymentTableMap::OM_CLASS;
            /** @var JobPayment $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            JobPaymentTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = JobPaymentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = JobPaymentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var JobPayment $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JobPaymentTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(JobPaymentTableMap::COL_JOB_ID);
            $criteria->addSelectColumn(JobPaymentTableMap::COL_MONEY_AMOUNT);
            $criteria->addSelectColumn(JobPaymentTableMap::COL_IS_ONLINE_PAY);
            $criteria->addSelectColumn(JobPaymentTableMap::COL_IS_IN_PERSON_PAY);
            $criteria->addSelectColumn(JobPaymentTableMap::COL_IS_BARTER);
            $criteria->addSelectColumn(JobPaymentTableMap::COL_BARTER_ITEM);
        } else {
            $criteria->addSelectColumn($alias . '.job_id');
            $criteria->addSelectColumn($alias . '.money_amount');
            $criteria->addSelectColumn($alias . '.is_online_pay');
            $criteria->addSelectColumn($alias . '.is_in_person_pay');
            $criteria->addSelectColumn($alias . '.is_barter');
            $criteria->addSelectColumn($alias . '.barter_item');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(JobPaymentTableMap::DATABASE_NAME)->getTable(JobPaymentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(JobPaymentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(JobPaymentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new JobPaymentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a JobPayment or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or JobPayment object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JobPaymentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \JobPayment) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JobPaymentTableMap::DATABASE_NAME);
            $criteria->add(JobPaymentTableMap::COL_JOB_ID, (array) $values, Criteria::IN);
        }

        $query = JobPaymentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            JobPaymentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                JobPaymentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the job_payment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return JobPaymentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a JobPayment or Criteria object.
     *
     * @param mixed               $criteria Criteria or JobPayment object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JobPaymentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from JobPayment object
        }


        // Set the correct dbName
        $query = JobPaymentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // JobPaymentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
JobPaymentTableMap::buildTableMap();
