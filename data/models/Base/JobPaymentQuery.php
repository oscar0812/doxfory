<?php

namespace Base;

use \JobPayment as ChildJobPayment;
use \JobPaymentQuery as ChildJobPaymentQuery;
use \Exception;
use \PDO;
use Map\JobPaymentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'job_payment' table.
 *
 *
 *
 * @method     ChildJobPaymentQuery orderByJobId($order = Criteria::ASC) Order by the job_id column
 * @method     ChildJobPaymentQuery orderByMoneyAmount($order = Criteria::ASC) Order by the money_amount column
 * @method     ChildJobPaymentQuery orderByIsOnlinePay($order = Criteria::ASC) Order by the is_online_pay column
 * @method     ChildJobPaymentQuery orderByIsInPersonPayment($order = Criteria::ASC) Order by the is_in_person_payment column
 * @method     ChildJobPaymentQuery orderByIsBarter($order = Criteria::ASC) Order by the is_barter column
 * @method     ChildJobPaymentQuery orderByBarterItem($order = Criteria::ASC) Order by the barter_item column
 *
 * @method     ChildJobPaymentQuery groupByJobId() Group by the job_id column
 * @method     ChildJobPaymentQuery groupByMoneyAmount() Group by the money_amount column
 * @method     ChildJobPaymentQuery groupByIsOnlinePay() Group by the is_online_pay column
 * @method     ChildJobPaymentQuery groupByIsInPersonPayment() Group by the is_in_person_payment column
 * @method     ChildJobPaymentQuery groupByIsBarter() Group by the is_barter column
 * @method     ChildJobPaymentQuery groupByBarterItem() Group by the barter_item column
 *
 * @method     ChildJobPaymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildJobPaymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildJobPaymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildJobPaymentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildJobPaymentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildJobPaymentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildJobPaymentQuery leftJoinJob($relationAlias = null) Adds a LEFT JOIN clause to the query using the Job relation
 * @method     ChildJobPaymentQuery rightJoinJob($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Job relation
 * @method     ChildJobPaymentQuery innerJoinJob($relationAlias = null) Adds a INNER JOIN clause to the query using the Job relation
 *
 * @method     ChildJobPaymentQuery joinWithJob($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Job relation
 *
 * @method     ChildJobPaymentQuery leftJoinWithJob() Adds a LEFT JOIN clause and with to the query using the Job relation
 * @method     ChildJobPaymentQuery rightJoinWithJob() Adds a RIGHT JOIN clause and with to the query using the Job relation
 * @method     ChildJobPaymentQuery innerJoinWithJob() Adds a INNER JOIN clause and with to the query using the Job relation
 *
 * @method     \JobQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildJobPayment findOne(ConnectionInterface $con = null) Return the first ChildJobPayment matching the query
 * @method     ChildJobPayment findOneOrCreate(ConnectionInterface $con = null) Return the first ChildJobPayment matching the query, or a new ChildJobPayment object populated from the query conditions when no match is found
 *
 * @method     ChildJobPayment findOneByJobId(int $job_id) Return the first ChildJobPayment filtered by the job_id column
 * @method     ChildJobPayment findOneByMoneyAmount(double $money_amount) Return the first ChildJobPayment filtered by the money_amount column
 * @method     ChildJobPayment findOneByIsOnlinePay(boolean $is_online_pay) Return the first ChildJobPayment filtered by the is_online_pay column
 * @method     ChildJobPayment findOneByIsInPersonPayment(boolean $is_in_person_payment) Return the first ChildJobPayment filtered by the is_in_person_payment column
 * @method     ChildJobPayment findOneByIsBarter(boolean $is_barter) Return the first ChildJobPayment filtered by the is_barter column
 * @method     ChildJobPayment findOneByBarterItem(string $barter_item) Return the first ChildJobPayment filtered by the barter_item column *

 * @method     ChildJobPayment requirePk($key, ConnectionInterface $con = null) Return the ChildJobPayment by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJobPayment requireOne(ConnectionInterface $con = null) Return the first ChildJobPayment matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJobPayment requireOneByJobId(int $job_id) Return the first ChildJobPayment filtered by the job_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJobPayment requireOneByMoneyAmount(double $money_amount) Return the first ChildJobPayment filtered by the money_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJobPayment requireOneByIsOnlinePay(boolean $is_online_pay) Return the first ChildJobPayment filtered by the is_online_pay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJobPayment requireOneByIsInPersonPayment(boolean $is_in_person_payment) Return the first ChildJobPayment filtered by the is_in_person_payment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJobPayment requireOneByIsBarter(boolean $is_barter) Return the first ChildJobPayment filtered by the is_barter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJobPayment requireOneByBarterItem(string $barter_item) Return the first ChildJobPayment filtered by the barter_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJobPayment[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildJobPayment objects based on current ModelCriteria
 * @method     ChildJobPayment[]|ObjectCollection findByJobId(int $job_id) Return ChildJobPayment objects filtered by the job_id column
 * @method     ChildJobPayment[]|ObjectCollection findByMoneyAmount(double $money_amount) Return ChildJobPayment objects filtered by the money_amount column
 * @method     ChildJobPayment[]|ObjectCollection findByIsOnlinePay(boolean $is_online_pay) Return ChildJobPayment objects filtered by the is_online_pay column
 * @method     ChildJobPayment[]|ObjectCollection findByIsInPersonPayment(boolean $is_in_person_payment) Return ChildJobPayment objects filtered by the is_in_person_payment column
 * @method     ChildJobPayment[]|ObjectCollection findByIsBarter(boolean $is_barter) Return ChildJobPayment objects filtered by the is_barter column
 * @method     ChildJobPayment[]|ObjectCollection findByBarterItem(string $barter_item) Return ChildJobPayment objects filtered by the barter_item column
 * @method     ChildJobPayment[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class JobPaymentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\JobPaymentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\JobPayment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildJobPaymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildJobPaymentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildJobPaymentQuery) {
            return $criteria;
        }
        $query = new ChildJobPaymentQuery();
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
     * @return ChildJobPayment|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(JobPaymentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = JobPaymentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildJobPayment A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT job_id, money_amount, is_online_pay, is_in_person_payment, is_barter, barter_item FROM job_payment WHERE job_id = :p0';
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
            /** @var ChildJobPayment $obj */
            $obj = new ChildJobPayment();
            $obj->hydrate($row);
            JobPaymentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildJobPayment|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the job_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJobId(1234); // WHERE job_id = 1234
     * $query->filterByJobId(array(12, 34)); // WHERE job_id IN (12, 34)
     * $query->filterByJobId(array('min' => 12)); // WHERE job_id > 12
     * </code>
     *
     * @see       filterByJob()
     *
     * @param     mixed $jobId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByJobId($jobId = null, $comparison = null)
    {
        if (is_array($jobId)) {
            $useMinMax = false;
            if (isset($jobId['min'])) {
                $this->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $jobId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jobId['max'])) {
                $this->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $jobId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $jobId, $comparison);
    }

    /**
     * Filter the query on the money_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByMoneyAmount(1234); // WHERE money_amount = 1234
     * $query->filterByMoneyAmount(array(12, 34)); // WHERE money_amount IN (12, 34)
     * $query->filterByMoneyAmount(array('min' => 12)); // WHERE money_amount > 12
     * </code>
     *
     * @param     mixed $moneyAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByMoneyAmount($moneyAmount = null, $comparison = null)
    {
        if (is_array($moneyAmount)) {
            $useMinMax = false;
            if (isset($moneyAmount['min'])) {
                $this->addUsingAlias(JobPaymentTableMap::COL_MONEY_AMOUNT, $moneyAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($moneyAmount['max'])) {
                $this->addUsingAlias(JobPaymentTableMap::COL_MONEY_AMOUNT, $moneyAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPaymentTableMap::COL_MONEY_AMOUNT, $moneyAmount, $comparison);
    }

    /**
     * Filter the query on the is_online_pay column
     *
     * Example usage:
     * <code>
     * $query->filterByIsOnlinePay(true); // WHERE is_online_pay = true
     * $query->filterByIsOnlinePay('yes'); // WHERE is_online_pay = true
     * </code>
     *
     * @param     boolean|string $isOnlinePay The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByIsOnlinePay($isOnlinePay = null, $comparison = null)
    {
        if (is_string($isOnlinePay)) {
            $isOnlinePay = in_array(strtolower($isOnlinePay), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(JobPaymentTableMap::COL_IS_ONLINE_PAY, $isOnlinePay, $comparison);
    }

    /**
     * Filter the query on the is_in_person_payment column
     *
     * Example usage:
     * <code>
     * $query->filterByIsInPersonPayment(true); // WHERE is_in_person_payment = true
     * $query->filterByIsInPersonPayment('yes'); // WHERE is_in_person_payment = true
     * </code>
     *
     * @param     boolean|string $isInPersonPayment The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByIsInPersonPayment($isInPersonPayment = null, $comparison = null)
    {
        if (is_string($isInPersonPayment)) {
            $isInPersonPayment = in_array(strtolower($isInPersonPayment), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(JobPaymentTableMap::COL_IS_IN_PERSON_PAYMENT, $isInPersonPayment, $comparison);
    }

    /**
     * Filter the query on the is_barter column
     *
     * Example usage:
     * <code>
     * $query->filterByIsBarter(true); // WHERE is_barter = true
     * $query->filterByIsBarter('yes'); // WHERE is_barter = true
     * </code>
     *
     * @param     boolean|string $isBarter The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByIsBarter($isBarter = null, $comparison = null)
    {
        if (is_string($isBarter)) {
            $isBarter = in_array(strtolower($isBarter), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(JobPaymentTableMap::COL_IS_BARTER, $isBarter, $comparison);
    }

    /**
     * Filter the query on the barter_item column
     *
     * Example usage:
     * <code>
     * $query->filterByBarterItem('fooValue');   // WHERE barter_item = 'fooValue'
     * $query->filterByBarterItem('%fooValue%', Criteria::LIKE); // WHERE barter_item LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barterItem The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByBarterItem($barterItem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barterItem)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPaymentTableMap::COL_BARTER_ITEM, $barterItem, $comparison);
    }

    /**
     * Filter the query by a related \Job object
     *
     * @param \Job|ObjectCollection $job The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildJobPaymentQuery The current query, for fluid interface
     */
    public function filterByJob($job, $comparison = null)
    {
        if ($job instanceof \Job) {
            return $this
                ->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $job->getId(), $comparison);
        } elseif ($job instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $job->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByJob() only accepts arguments of type \Job or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Job relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function joinJob($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Job');

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
            $this->addJoinObject($join, 'Job');
        }

        return $this;
    }

    /**
     * Use the Job relation Job object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \JobQuery A secondary query class using the current class as primary query
     */
    public function useJobQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJob($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Job', '\JobQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildJobPayment $jobPayment Object to remove from the list of results
     *
     * @return $this|ChildJobPaymentQuery The current query, for fluid interface
     */
    public function prune($jobPayment = null)
    {
        if ($jobPayment) {
            $this->addUsingAlias(JobPaymentTableMap::COL_JOB_ID, $jobPayment->getJobId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the job_payment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JobPaymentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JobPaymentTableMap::clearInstancePool();
            JobPaymentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(JobPaymentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(JobPaymentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            JobPaymentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            JobPaymentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // JobPaymentQuery
