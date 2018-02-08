<?php

namespace Map;

use \ContactInfo;
use \ContactInfoQuery;
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
 * This class defines the structure of the 'contact_info' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ContactInfoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ContactInfoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'contact_info';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ContactInfo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ContactInfo';

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
    const COL_USER_ID = 'contact_info.user_id';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'contact_info.email';

    /**
     * the column name for the phone_number field
     */
    const COL_PHONE_NUMBER = 'contact_info.phone_number';

    /**
     * the column name for the facebook_username field
     */
    const COL_FACEBOOK_USERNAME = 'contact_info.facebook_username';

    /**
     * the column name for the twitter_username field
     */
    const COL_TWITTER_USERNAME = 'contact_info.twitter_username';

    /**
     * the column name for the instagram_username field
     */
    const COL_INSTAGRAM_USERNAME = 'contact_info.instagram_username';

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
        self::TYPE_PHPNAME       => array('UserId', 'Email', 'PhoneNumber', 'FacebookUsername', 'TwitterUsername', 'InstagramUsername', ),
        self::TYPE_CAMELNAME     => array('userId', 'email', 'phoneNumber', 'facebookUsername', 'twitterUsername', 'instagramUsername', ),
        self::TYPE_COLNAME       => array(ContactInfoTableMap::COL_USER_ID, ContactInfoTableMap::COL_EMAIL, ContactInfoTableMap::COL_PHONE_NUMBER, ContactInfoTableMap::COL_FACEBOOK_USERNAME, ContactInfoTableMap::COL_TWITTER_USERNAME, ContactInfoTableMap::COL_INSTAGRAM_USERNAME, ),
        self::TYPE_FIELDNAME     => array('user_id', 'email', 'phone_number', 'facebook_username', 'twitter_username', 'instagram_username', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('UserId' => 0, 'Email' => 1, 'PhoneNumber' => 2, 'FacebookUsername' => 3, 'TwitterUsername' => 4, 'InstagramUsername' => 5, ),
        self::TYPE_CAMELNAME     => array('userId' => 0, 'email' => 1, 'phoneNumber' => 2, 'facebookUsername' => 3, 'twitterUsername' => 4, 'instagramUsername' => 5, ),
        self::TYPE_COLNAME       => array(ContactInfoTableMap::COL_USER_ID => 0, ContactInfoTableMap::COL_EMAIL => 1, ContactInfoTableMap::COL_PHONE_NUMBER => 2, ContactInfoTableMap::COL_FACEBOOK_USERNAME => 3, ContactInfoTableMap::COL_TWITTER_USERNAME => 4, ContactInfoTableMap::COL_INSTAGRAM_USERNAME => 5, ),
        self::TYPE_FIELDNAME     => array('user_id' => 0, 'email' => 1, 'phone_number' => 2, 'facebook_username' => 3, 'twitter_username' => 4, 'instagram_username' => 5, ),
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
        $this->setName('contact_info');
        $this->setPhpName('ContactInfo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ContactInfo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addForeignPrimaryKey('user_id', 'UserId', 'INTEGER' , 'user', 'id', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 64, null);
        $this->addColumn('phone_number', 'PhoneNumber', 'VARCHAR', true, 32, null);
        $this->addColumn('facebook_username', 'FacebookUsername', 'VARCHAR', true, 64, null);
        $this->addColumn('twitter_username', 'TwitterUsername', 'VARCHAR', true, 64, null);
        $this->addColumn('instagram_username', 'InstagramUsername', 'VARCHAR', true, 64, null);
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
        return $withPrefix ? ContactInfoTableMap::CLASS_DEFAULT : ContactInfoTableMap::OM_CLASS;
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
     * @return array           (ContactInfo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ContactInfoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ContactInfoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ContactInfoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContactInfoTableMap::OM_CLASS;
            /** @var ContactInfo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ContactInfoTableMap::addInstanceToPool($obj, $key);
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
            $key = ContactInfoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ContactInfoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ContactInfo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContactInfoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ContactInfoTableMap::COL_USER_ID);
            $criteria->addSelectColumn(ContactInfoTableMap::COL_EMAIL);
            $criteria->addSelectColumn(ContactInfoTableMap::COL_PHONE_NUMBER);
            $criteria->addSelectColumn(ContactInfoTableMap::COL_FACEBOOK_USERNAME);
            $criteria->addSelectColumn(ContactInfoTableMap::COL_TWITTER_USERNAME);
            $criteria->addSelectColumn(ContactInfoTableMap::COL_INSTAGRAM_USERNAME);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone_number');
            $criteria->addSelectColumn($alias . '.facebook_username');
            $criteria->addSelectColumn($alias . '.twitter_username');
            $criteria->addSelectColumn($alias . '.instagram_username');
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
        return Propel::getServiceContainer()->getDatabaseMap(ContactInfoTableMap::DATABASE_NAME)->getTable(ContactInfoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ContactInfoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ContactInfoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ContactInfoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ContactInfo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ContactInfo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ContactInfoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ContactInfo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ContactInfoTableMap::DATABASE_NAME);
            $criteria->add(ContactInfoTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = ContactInfoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ContactInfoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ContactInfoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the contact_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ContactInfoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ContactInfo or Criteria object.
     *
     * @param mixed               $criteria Criteria or ContactInfo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContactInfoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ContactInfo object
        }


        // Set the correct dbName
        $query = ContactInfoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ContactInfoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ContactInfoTableMap::buildTableMap();
