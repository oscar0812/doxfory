<?php

namespace Map;

use \UserContactInfo;
use \UserContactInfoQuery;
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
 * This class defines the structure of the 'user_contact_info' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UserContactInfoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UserContactInfoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'user_contact_info';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\UserContactInfo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'UserContactInfo';

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
     * the column name for the user_id field
     */
    const COL_USER_ID = 'user_contact_info.user_id';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'user_contact_info.email';

    /**
     * the column name for the phone_number field
     */
    const COL_PHONE_NUMBER = 'user_contact_info.phone_number';

    /**
     * the column name for the facebook field
     */
    const COL_FACEBOOK = 'user_contact_info.facebook';

    /**
     * the column name for the twitter field
     */
    const COL_TWITTER = 'user_contact_info.twitter';

    /**
     * the column name for the instagram field
     */
    const COL_INSTAGRAM = 'user_contact_info.instagram';

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
        self::TYPE_PHPNAME       => array('UserId', 'Email', 'PhoneNumber', 'Facebook', 'Twitter', 'Instagram', ),
        self::TYPE_CAMELNAME     => array('userId', 'email', 'phoneNumber', 'facebook', 'twitter', 'instagram', ),
        self::TYPE_COLNAME       => array(UserContactInfoTableMap::COL_USER_ID, UserContactInfoTableMap::COL_EMAIL, UserContactInfoTableMap::COL_PHONE_NUMBER, UserContactInfoTableMap::COL_FACEBOOK, UserContactInfoTableMap::COL_TWITTER, UserContactInfoTableMap::COL_INSTAGRAM, ),
        self::TYPE_FIELDNAME     => array('user_id', 'email', 'phone_number', 'facebook', 'twitter', 'instagram', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('UserId' => 0, 'Email' => 1, 'PhoneNumber' => 2, 'Facebook' => 3, 'Twitter' => 4, 'Instagram' => 5, ),
        self::TYPE_CAMELNAME     => array('userId' => 0, 'email' => 1, 'phoneNumber' => 2, 'facebook' => 3, 'twitter' => 4, 'instagram' => 5, ),
        self::TYPE_COLNAME       => array(UserContactInfoTableMap::COL_USER_ID => 0, UserContactInfoTableMap::COL_EMAIL => 1, UserContactInfoTableMap::COL_PHONE_NUMBER => 2, UserContactInfoTableMap::COL_FACEBOOK => 3, UserContactInfoTableMap::COL_TWITTER => 4, UserContactInfoTableMap::COL_INSTAGRAM => 5, ),
        self::TYPE_FIELDNAME     => array('user_id' => 0, 'email' => 1, 'phone_number' => 2, 'facebook' => 3, 'twitter' => 4, 'instagram' => 5, ),
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
        $this->setName('user_contact_info');
        $this->setPhpName('UserContactInfo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\UserContactInfo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addForeignPrimaryKey('user_id', 'UserId', 'INTEGER' , 'user', 'id', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 64, null);
        $this->addColumn('phone_number', 'PhoneNumber', 'VARCHAR', true, 32, null);
        $this->addColumn('facebook', 'Facebook', 'VARCHAR', true, 64, null);
        $this->addColumn('twitter', 'Twitter', 'VARCHAR', true, 64, null);
        $this->addColumn('instagram', 'Instagram', 'VARCHAR', true, 64, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UserContactInfoTableMap::CLASS_DEFAULT : UserContactInfoTableMap::OM_CLASS;
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
     * @return array           (UserContactInfo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UserContactInfoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserContactInfoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserContactInfoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserContactInfoTableMap::OM_CLASS;
            /** @var UserContactInfo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserContactInfoTableMap::addInstanceToPool($obj, $key);
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
            $key = UserContactInfoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserContactInfoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var UserContactInfo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserContactInfoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UserContactInfoTableMap::COL_USER_ID);
            $criteria->addSelectColumn(UserContactInfoTableMap::COL_EMAIL);
            $criteria->addSelectColumn(UserContactInfoTableMap::COL_PHONE_NUMBER);
            $criteria->addSelectColumn(UserContactInfoTableMap::COL_FACEBOOK);
            $criteria->addSelectColumn(UserContactInfoTableMap::COL_TWITTER);
            $criteria->addSelectColumn(UserContactInfoTableMap::COL_INSTAGRAM);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone_number');
            $criteria->addSelectColumn($alias . '.facebook');
            $criteria->addSelectColumn($alias . '.twitter');
            $criteria->addSelectColumn($alias . '.instagram');
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
        return Propel::getServiceContainer()->getDatabaseMap(UserContactInfoTableMap::DATABASE_NAME)->getTable(UserContactInfoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UserContactInfoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UserContactInfoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UserContactInfoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a UserContactInfo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or UserContactInfo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UserContactInfoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \UserContactInfo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserContactInfoTableMap::DATABASE_NAME);
            $criteria->add(UserContactInfoTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = UserContactInfoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserContactInfoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserContactInfoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the user_contact_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UserContactInfoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a UserContactInfo or Criteria object.
     *
     * @param mixed               $criteria Criteria or UserContactInfo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserContactInfoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from UserContactInfo object
        }


        // Set the correct dbName
        $query = UserContactInfoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UserContactInfoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UserContactInfoTableMap::buildTableMap();
