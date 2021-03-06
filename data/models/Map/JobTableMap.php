<?php

namespace Map;

use \Job;
use \JobQuery;
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
 * This class defines the structure of the 'job' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class JobTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.JobTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'job';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Job';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Job';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'job.id';

    /**
     * the column name for the time_posted field
     */
    const COL_TIME_POSTED = 'job.time_posted';

    /**
     * the column name for the is_completed field
     */
    const COL_IS_COMPLETED = 'job.is_completed';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'job.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'job.description';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'job.image';

    /**
     * the column name for the notify field
     */
    const COL_NOTIFY = 'job.notify';

    /**
     * the column name for the latitude field
     */
    const COL_LATITUDE = 'job.latitude';

    /**
     * the column name for the longitude field
     */
    const COL_LONGITUDE = 'job.longitude';

    /**
     * the column name for the posted_by_id field
     */
    const COL_POSTED_BY_ID = 'job.posted_by_id';

    /**
     * the column name for the accepted_by_id field
     */
    const COL_ACCEPTED_BY_ID = 'job.accepted_by_id';

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
        self::TYPE_PHPNAME       => array('Id', 'TimePosted', 'IsCompleted', 'Title', 'Description', 'Image', 'Notify', 'Latitude', 'Longitude', 'PostedById', 'AcceptedById', ),
        self::TYPE_CAMELNAME     => array('id', 'timePosted', 'isCompleted', 'title', 'description', 'image', 'notify', 'latitude', 'longitude', 'postedById', 'acceptedById', ),
        self::TYPE_COLNAME       => array(JobTableMap::COL_ID, JobTableMap::COL_TIME_POSTED, JobTableMap::COL_IS_COMPLETED, JobTableMap::COL_TITLE, JobTableMap::COL_DESCRIPTION, JobTableMap::COL_IMAGE, JobTableMap::COL_NOTIFY, JobTableMap::COL_LATITUDE, JobTableMap::COL_LONGITUDE, JobTableMap::COL_POSTED_BY_ID, JobTableMap::COL_ACCEPTED_BY_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'time_posted', 'is_completed', 'title', 'description', 'image', 'notify', 'latitude', 'longitude', 'posted_by_id', 'accepted_by_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'TimePosted' => 1, 'IsCompleted' => 2, 'Title' => 3, 'Description' => 4, 'Image' => 5, 'Notify' => 6, 'Latitude' => 7, 'Longitude' => 8, 'PostedById' => 9, 'AcceptedById' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'timePosted' => 1, 'isCompleted' => 2, 'title' => 3, 'description' => 4, 'image' => 5, 'notify' => 6, 'latitude' => 7, 'longitude' => 8, 'postedById' => 9, 'acceptedById' => 10, ),
        self::TYPE_COLNAME       => array(JobTableMap::COL_ID => 0, JobTableMap::COL_TIME_POSTED => 1, JobTableMap::COL_IS_COMPLETED => 2, JobTableMap::COL_TITLE => 3, JobTableMap::COL_DESCRIPTION => 4, JobTableMap::COL_IMAGE => 5, JobTableMap::COL_NOTIFY => 6, JobTableMap::COL_LATITUDE => 7, JobTableMap::COL_LONGITUDE => 8, JobTableMap::COL_POSTED_BY_ID => 9, JobTableMap::COL_ACCEPTED_BY_ID => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'time_posted' => 1, 'is_completed' => 2, 'title' => 3, 'description' => 4, 'image' => 5, 'notify' => 6, 'latitude' => 7, 'longitude' => 8, 'posted_by_id' => 9, 'accepted_by_id' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('job');
        $this->setPhpName('Job');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Job');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('time_posted', 'TimePosted', 'INTEGER', true, 16, null);
        $this->addColumn('is_completed', 'IsCompleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 4098, null);
        $this->addColumn('image', 'Image', 'VARCHAR', true, 4098, null);
        $this->addColumn('notify', 'Notify', 'BOOLEAN', true, 1, false);
        $this->addColumn('latitude', 'Latitude', 'DECIMAL', true, 32, null);
        $this->addColumn('longitude', 'Longitude', 'DECIMAL', true, 32, null);
        $this->addForeignKey('posted_by_id', 'PostedById', 'INTEGER', 'user', 'id', true, null, null);
        $this->addForeignKey('accepted_by_id', 'AcceptedById', 'INTEGER', 'user', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PostedByUser', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':posted_by_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('AcceptedByUser', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':accepted_by_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Comment', '\\Comment', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':job_id',
    1 => ':id',
  ),
), null, null, 'Comments', false);
        $this->addRelation('JobPayment', '\\JobPayment', RelationMap::ONE_TO_ONE, array (
  0 =>
  array (
    0 => ':job_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'validate' => array('rule1' => array ('column' => 'title','validator' => 'Length','options' => array ('min' => 1,),), 'rule2' => array ('column' => 'description','validator' => 'Length','options' => array ('min' => 1,),), ),
        );
    } // getBehaviors()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? JobTableMap::CLASS_DEFAULT : JobTableMap::OM_CLASS;
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
     * @return array           (Job object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = JobTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = JobTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + JobTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JobTableMap::OM_CLASS;
            /** @var Job $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            JobTableMap::addInstanceToPool($obj, $key);
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
            $key = JobTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = JobTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Job $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JobTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(JobTableMap::COL_ID);
            $criteria->addSelectColumn(JobTableMap::COL_TIME_POSTED);
            $criteria->addSelectColumn(JobTableMap::COL_IS_COMPLETED);
            $criteria->addSelectColumn(JobTableMap::COL_TITLE);
            $criteria->addSelectColumn(JobTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(JobTableMap::COL_IMAGE);
            $criteria->addSelectColumn(JobTableMap::COL_NOTIFY);
            $criteria->addSelectColumn(JobTableMap::COL_LATITUDE);
            $criteria->addSelectColumn(JobTableMap::COL_LONGITUDE);
            $criteria->addSelectColumn(JobTableMap::COL_POSTED_BY_ID);
            $criteria->addSelectColumn(JobTableMap::COL_ACCEPTED_BY_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.time_posted');
            $criteria->addSelectColumn($alias . '.is_completed');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.notify');
            $criteria->addSelectColumn($alias . '.latitude');
            $criteria->addSelectColumn($alias . '.longitude');
            $criteria->addSelectColumn($alias . '.posted_by_id');
            $criteria->addSelectColumn($alias . '.accepted_by_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(JobTableMap::DATABASE_NAME)->getTable(JobTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(JobTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(JobTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new JobTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Job or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Job object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(JobTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Job) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JobTableMap::DATABASE_NAME);
            $criteria->add(JobTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = JobQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            JobTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                JobTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the job table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return JobQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Job or Criteria object.
     *
     * @param mixed               $criteria Criteria or Job object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JobTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Job object
        }

        if ($criteria->containsKey(JobTableMap::COL_ID) && $criteria->keyContainsValue(JobTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.JobTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = JobQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // JobTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
JobTableMap::buildTableMap();
