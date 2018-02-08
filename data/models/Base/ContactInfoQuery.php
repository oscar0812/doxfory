<?php

namespace Base;

use \ContactInfo as ChildContactInfo;
use \ContactInfoQuery as ChildContactInfoQuery;
use \Exception;
use \PDO;
use Map\ContactInfoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'contact_info' table.
 *
 *
 *
 * @method     ChildContactInfoQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildContactInfoQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildContactInfoQuery orderByPhoneNumber($order = Criteria::ASC) Order by the phone_number column
 * @method     ChildContactInfoQuery orderByFacebookUsername($order = Criteria::ASC) Order by the facebook_username column
 * @method     ChildContactInfoQuery orderByTwitterUsername($order = Criteria::ASC) Order by the twitter_username column
 * @method     ChildContactInfoQuery orderByInstagramUsername($order = Criteria::ASC) Order by the instagram_username column
 *
 * @method     ChildContactInfoQuery groupByUserId() Group by the user_id column
 * @method     ChildContactInfoQuery groupByEmail() Group by the email column
 * @method     ChildContactInfoQuery groupByPhoneNumber() Group by the phone_number column
 * @method     ChildContactInfoQuery groupByFacebookUsername() Group by the facebook_username column
 * @method     ChildContactInfoQuery groupByTwitterUsername() Group by the twitter_username column
 * @method     ChildContactInfoQuery groupByInstagramUsername() Group by the instagram_username column
 *
 * @method     ChildContactInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildContactInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildContactInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildContactInfoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildContactInfoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildContactInfoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildContactInfoQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildContactInfoQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildContactInfoQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildContactInfoQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildContactInfoQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildContactInfoQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildContactInfoQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildContactInfo findOne(ConnectionInterface $con = null) Return the first ChildContactInfo matching the query
 * @method     ChildContactInfo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildContactInfo matching the query, or a new ChildContactInfo object populated from the query conditions when no match is found
 *
 * @method     ChildContactInfo findOneByUserId(int $user_id) Return the first ChildContactInfo filtered by the user_id column
 * @method     ChildContactInfo findOneByEmail(string $email) Return the first ChildContactInfo filtered by the email column
 * @method     ChildContactInfo findOneByPhoneNumber(string $phone_number) Return the first ChildContactInfo filtered by the phone_number column
 * @method     ChildContactInfo findOneByFacebookUsername(string $facebook_username) Return the first ChildContactInfo filtered by the facebook_username column
 * @method     ChildContactInfo findOneByTwitterUsername(string $twitter_username) Return the first ChildContactInfo filtered by the twitter_username column
 * @method     ChildContactInfo findOneByInstagramUsername(string $instagram_username) Return the first ChildContactInfo filtered by the instagram_username column *

 * @method     ChildContactInfo requirePk($key, ConnectionInterface $con = null) Return the ChildContactInfo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactInfo requireOne(ConnectionInterface $con = null) Return the first ChildContactInfo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContactInfo requireOneByUserId(int $user_id) Return the first ChildContactInfo filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactInfo requireOneByEmail(string $email) Return the first ChildContactInfo filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactInfo requireOneByPhoneNumber(string $phone_number) Return the first ChildContactInfo filtered by the phone_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactInfo requireOneByFacebookUsername(string $facebook_username) Return the first ChildContactInfo filtered by the facebook_username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactInfo requireOneByTwitterUsername(string $twitter_username) Return the first ChildContactInfo filtered by the twitter_username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactInfo requireOneByInstagramUsername(string $instagram_username) Return the first ChildContactInfo filtered by the instagram_username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContactInfo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildContactInfo objects based on current ModelCriteria
 * @method     ChildContactInfo[]|ObjectCollection findByUserId(int $user_id) Return ChildContactInfo objects filtered by the user_id column
 * @method     ChildContactInfo[]|ObjectCollection findByEmail(string $email) Return ChildContactInfo objects filtered by the email column
 * @method     ChildContactInfo[]|ObjectCollection findByPhoneNumber(string $phone_number) Return ChildContactInfo objects filtered by the phone_number column
 * @method     ChildContactInfo[]|ObjectCollection findByFacebookUsername(string $facebook_username) Return ChildContactInfo objects filtered by the facebook_username column
 * @method     ChildContactInfo[]|ObjectCollection findByTwitterUsername(string $twitter_username) Return ChildContactInfo objects filtered by the twitter_username column
 * @method     ChildContactInfo[]|ObjectCollection findByInstagramUsername(string $instagram_username) Return ChildContactInfo objects filtered by the instagram_username column
 * @method     ChildContactInfo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ContactInfoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ContactInfoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ContactInfo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildContactInfoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildContactInfoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildContactInfoQuery) {
            return $criteria;
        }
        $query = new ChildContactInfoQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildContactInfo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ContactInfoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ContactInfoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildContactInfo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, email, phone_number, facebook_username, twitter_username, instagram_username FROM contact_info WHERE user_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildContactInfo $obj */
            $obj = new ChildContactInfo();
            $obj->hydrate($row);
            ContactInfoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildContactInfo|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactInfoTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone_number column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneNumber('fooValue');   // WHERE phone_number = 'fooValue'
     * $query->filterByPhoneNumber('%fooValue%', Criteria::LIKE); // WHERE phone_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByPhoneNumber($phoneNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactInfoTableMap::COL_PHONE_NUMBER, $phoneNumber, $comparison);
    }

    /**
     * Filter the query on the facebook_username column
     *
     * Example usage:
     * <code>
     * $query->filterByFacebookUsername('fooValue');   // WHERE facebook_username = 'fooValue'
     * $query->filterByFacebookUsername('%fooValue%', Criteria::LIKE); // WHERE facebook_username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $facebookUsername The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByFacebookUsername($facebookUsername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($facebookUsername)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactInfoTableMap::COL_FACEBOOK_USERNAME, $facebookUsername, $comparison);
    }

    /**
     * Filter the query on the twitter_username column
     *
     * Example usage:
     * <code>
     * $query->filterByTwitterUsername('fooValue');   // WHERE twitter_username = 'fooValue'
     * $query->filterByTwitterUsername('%fooValue%', Criteria::LIKE); // WHERE twitter_username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $twitterUsername The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByTwitterUsername($twitterUsername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($twitterUsername)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactInfoTableMap::COL_TWITTER_USERNAME, $twitterUsername, $comparison);
    }

    /**
     * Filter the query on the instagram_username column
     *
     * Example usage:
     * <code>
     * $query->filterByInstagramUsername('fooValue');   // WHERE instagram_username = 'fooValue'
     * $query->filterByInstagramUsername('%fooValue%', Criteria::LIKE); // WHERE instagram_username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instagramUsername The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByInstagramUsername($instagramUsername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instagramUsername)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactInfoTableMap::COL_INSTAGRAM_USERNAME, $instagramUsername, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildContactInfoQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildContactInfo $contactInfo Object to remove from the list of results
     *
     * @return $this|ChildContactInfoQuery The current query, for fluid interface
     */
    public function prune($contactInfo = null)
    {
        if ($contactInfo) {
            $this->addUsingAlias(ContactInfoTableMap::COL_USER_ID, $contactInfo->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the contact_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContactInfoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContactInfoTableMap::clearInstancePool();
            ContactInfoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContactInfoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ContactInfoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ContactInfoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ContactInfoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ContactInfoQuery
