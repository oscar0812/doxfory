<?php

namespace Base;

use \Job as ChildJob;
use \JobQuery as ChildJobQuery;
use \Exception;
use \PDO;
use Map\JobTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'job' table.
 *
 *
 *
 * @method     ChildJobQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildJobQuery orderByIsCompleted($order = Criteria::ASC) Order by the is_completed column
 * @method     ChildJobQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildJobQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildJobQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildJobQuery orderByPayment($order = Criteria::ASC) Order by the payment column
 * @method     ChildJobQuery orderByPostedById($order = Criteria::ASC) Order by the posted_by_id column
 * @method     ChildJobQuery orderByAcceptedById($order = Criteria::ASC) Order by the accepted_by_id column
 *
 * @method     ChildJobQuery groupById() Group by the id column
 * @method     ChildJobQuery groupByIsCompleted() Group by the is_completed column
 * @method     ChildJobQuery groupByTitle() Group by the title column
 * @method     ChildJobQuery groupByDescription() Group by the description column
 * @method     ChildJobQuery groupByImage() Group by the image column
 * @method     ChildJobQuery groupByPayment() Group by the payment column
 * @method     ChildJobQuery groupByPostedById() Group by the posted_by_id column
 * @method     ChildJobQuery groupByAcceptedById() Group by the accepted_by_id column
 *
 * @method     ChildJobQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildJobQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildJobQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildJobQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildJobQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildJobQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildJobQuery leftJoinPostedByUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostedByUser relation
 * @method     ChildJobQuery rightJoinPostedByUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostedByUser relation
 * @method     ChildJobQuery innerJoinPostedByUser($relationAlias = null) Adds a INNER JOIN clause to the query using the PostedByUser relation
 *
 * @method     ChildJobQuery joinWithPostedByUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PostedByUser relation
 *
 * @method     ChildJobQuery leftJoinWithPostedByUser() Adds a LEFT JOIN clause and with to the query using the PostedByUser relation
 * @method     ChildJobQuery rightJoinWithPostedByUser() Adds a RIGHT JOIN clause and with to the query using the PostedByUser relation
 * @method     ChildJobQuery innerJoinWithPostedByUser() Adds a INNER JOIN clause and with to the query using the PostedByUser relation
 *
 * @method     ChildJobQuery leftJoinAcceptedByUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AcceptedByUser relation
 * @method     ChildJobQuery rightJoinAcceptedByUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AcceptedByUser relation
 * @method     ChildJobQuery innerJoinAcceptedByUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AcceptedByUser relation
 *
 * @method     ChildJobQuery joinWithAcceptedByUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AcceptedByUser relation
 *
 * @method     ChildJobQuery leftJoinWithAcceptedByUser() Adds a LEFT JOIN clause and with to the query using the AcceptedByUser relation
 * @method     ChildJobQuery rightJoinWithAcceptedByUser() Adds a RIGHT JOIN clause and with to the query using the AcceptedByUser relation
 * @method     ChildJobQuery innerJoinWithAcceptedByUser() Adds a INNER JOIN clause and with to the query using the AcceptedByUser relation
 *
 * @method     \UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildJob findOne(ConnectionInterface $con = null) Return the first ChildJob matching the query
 * @method     ChildJob findOneOrCreate(ConnectionInterface $con = null) Return the first ChildJob matching the query, or a new ChildJob object populated from the query conditions when no match is found
 *
 * @method     ChildJob findOneById(int $id) Return the first ChildJob filtered by the id column
 * @method     ChildJob findOneByIsCompleted(boolean $is_completed) Return the first ChildJob filtered by the is_completed column
 * @method     ChildJob findOneByTitle(string $title) Return the first ChildJob filtered by the title column
 * @method     ChildJob findOneByDescription(string $description) Return the first ChildJob filtered by the description column
 * @method     ChildJob findOneByImage(string $image) Return the first ChildJob filtered by the image column
 * @method     ChildJob findOneByPayment(int $payment) Return the first ChildJob filtered by the payment column
 * @method     ChildJob findOneByPostedById(int $posted_by_id) Return the first ChildJob filtered by the posted_by_id column
 * @method     ChildJob findOneByAcceptedById(int $accepted_by_id) Return the first ChildJob filtered by the accepted_by_id column *

 * @method     ChildJob requirePk($key, ConnectionInterface $con = null) Return the ChildJob by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOne(ConnectionInterface $con = null) Return the first ChildJob matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJob requireOneById(int $id) Return the first ChildJob filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOneByIsCompleted(boolean $is_completed) Return the first ChildJob filtered by the is_completed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOneByTitle(string $title) Return the first ChildJob filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOneByDescription(string $description) Return the first ChildJob filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOneByImage(string $image) Return the first ChildJob filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOneByPayment(int $payment) Return the first ChildJob filtered by the payment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOneByPostedById(int $posted_by_id) Return the first ChildJob filtered by the posted_by_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJob requireOneByAcceptedById(int $accepted_by_id) Return the first ChildJob filtered by the accepted_by_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJob[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildJob objects based on current ModelCriteria
 * @method     ChildJob[]|ObjectCollection findById(int $id) Return ChildJob objects filtered by the id column
 * @method     ChildJob[]|ObjectCollection findByIsCompleted(boolean $is_completed) Return ChildJob objects filtered by the is_completed column
 * @method     ChildJob[]|ObjectCollection findByTitle(string $title) Return ChildJob objects filtered by the title column
 * @method     ChildJob[]|ObjectCollection findByDescription(string $description) Return ChildJob objects filtered by the description column
 * @method     ChildJob[]|ObjectCollection findByImage(string $image) Return ChildJob objects filtered by the image column
 * @method     ChildJob[]|ObjectCollection findByPayment(int $payment) Return ChildJob objects filtered by the payment column
 * @method     ChildJob[]|ObjectCollection findByPostedById(int $posted_by_id) Return ChildJob objects filtered by the posted_by_id column
 * @method     ChildJob[]|ObjectCollection findByAcceptedById(int $accepted_by_id) Return ChildJob objects filtered by the accepted_by_id column
 * @method     ChildJob[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class JobQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\JobQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Job', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildJobQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildJobQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildJobQuery) {
            return $criteria;
        }
        $query = new ChildJobQuery();
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
     * @return ChildJob|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(JobTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = JobTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildJob A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, is_completed, title, description, image, payment, posted_by_id, accepted_by_id FROM job WHERE id = :p0';
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
            /** @var ChildJob $obj */
            $obj = new ChildJob();
            $obj->hydrate($row);
            JobTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildJob|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JobTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JobTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(JobTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(JobTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the is_completed column
     *
     * Example usage:
     * <code>
     * $query->filterByIsCompleted(true); // WHERE is_completed = true
     * $query->filterByIsCompleted('yes'); // WHERE is_completed = true
     * </code>
     *
     * @param     boolean|string $isCompleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByIsCompleted($isCompleted = null, $comparison = null)
    {
        if (is_string($isCompleted)) {
            $isCompleted = in_array(strtolower($isCompleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(JobTableMap::COL_IS_COMPLETED, $isCompleted, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the payment column
     *
     * Example usage:
     * <code>
     * $query->filterByPayment(1234); // WHERE payment = 1234
     * $query->filterByPayment(array(12, 34)); // WHERE payment IN (12, 34)
     * $query->filterByPayment(array('min' => 12)); // WHERE payment > 12
     * </code>
     *
     * @param     mixed $payment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByPayment($payment = null, $comparison = null)
    {
        if (is_array($payment)) {
            $useMinMax = false;
            if (isset($payment['min'])) {
                $this->addUsingAlias(JobTableMap::COL_PAYMENT, $payment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payment['max'])) {
                $this->addUsingAlias(JobTableMap::COL_PAYMENT, $payment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTableMap::COL_PAYMENT, $payment, $comparison);
    }

    /**
     * Filter the query on the posted_by_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPostedById(1234); // WHERE posted_by_id = 1234
     * $query->filterByPostedById(array(12, 34)); // WHERE posted_by_id IN (12, 34)
     * $query->filterByPostedById(array('min' => 12)); // WHERE posted_by_id > 12
     * </code>
     *
     * @see       filterByPostedByUser()
     *
     * @param     mixed $postedById The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByPostedById($postedById = null, $comparison = null)
    {
        if (is_array($postedById)) {
            $useMinMax = false;
            if (isset($postedById['min'])) {
                $this->addUsingAlias(JobTableMap::COL_POSTED_BY_ID, $postedById['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postedById['max'])) {
                $this->addUsingAlias(JobTableMap::COL_POSTED_BY_ID, $postedById['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTableMap::COL_POSTED_BY_ID, $postedById, $comparison);
    }

    /**
     * Filter the query on the accepted_by_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAcceptedById(1234); // WHERE accepted_by_id = 1234
     * $query->filterByAcceptedById(array(12, 34)); // WHERE accepted_by_id IN (12, 34)
     * $query->filterByAcceptedById(array('min' => 12)); // WHERE accepted_by_id > 12
     * </code>
     *
     * @see       filterByAcceptedByUser()
     *
     * @param     mixed $acceptedById The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function filterByAcceptedById($acceptedById = null, $comparison = null)
    {
        if (is_array($acceptedById)) {
            $useMinMax = false;
            if (isset($acceptedById['min'])) {
                $this->addUsingAlias(JobTableMap::COL_ACCEPTED_BY_ID, $acceptedById['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acceptedById['max'])) {
                $this->addUsingAlias(JobTableMap::COL_ACCEPTED_BY_ID, $acceptedById['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTableMap::COL_ACCEPTED_BY_ID, $acceptedById, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildJobQuery The current query, for fluid interface
     */
    public function filterByPostedByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(JobTableMap::COL_POSTED_BY_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JobTableMap::COL_POSTED_BY_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPostedByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PostedByUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function joinPostedByUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PostedByUser');

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
            $this->addJoinObject($join, 'PostedByUser');
        }

        return $this;
    }

    /**
     * Use the PostedByUser relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function usePostedByUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPostedByUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PostedByUser', '\UserQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildJobQuery The current query, for fluid interface
     */
    public function filterByAcceptedByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(JobTableMap::COL_ACCEPTED_BY_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JobTableMap::COL_ACCEPTED_BY_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAcceptedByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AcceptedByUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function joinAcceptedByUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AcceptedByUser');

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
            $this->addJoinObject($join, 'AcceptedByUser');
        }

        return $this;
    }

    /**
     * Use the AcceptedByUser relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useAcceptedByUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAcceptedByUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AcceptedByUser', '\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildJob $job Object to remove from the list of results
     *
     * @return $this|ChildJobQuery The current query, for fluid interface
     */
    public function prune($job = null)
    {
        if ($job) {
            $this->addUsingAlias(JobTableMap::COL_ID, $job->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the job table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JobTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JobTableMap::clearInstancePool();
            JobTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(JobTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(JobTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            JobTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            JobTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // JobQuery
