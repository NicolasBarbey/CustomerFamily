<?php

namespace CustomerFamily\Model\Base;

use \Exception;
use \PDO;
use CustomerFamily\Model\CustomerFamily as ChildCustomerFamily;
use CustomerFamily\Model\CustomerFamilyI18nQuery as ChildCustomerFamilyI18nQuery;
use CustomerFamily\Model\CustomerFamilyQuery as ChildCustomerFamilyQuery;
use CustomerFamily\Model\Map\CustomerFamilyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'customer_family' table.
 *
 *
 *
 * @method     ChildCustomerFamilyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCustomerFamilyQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildCustomerFamilyQuery orderByCategoryRestrictionEnabled($order = Criteria::ASC) Order by the category_restriction_enabled column
 * @method     ChildCustomerFamilyQuery orderByBrandRestrictionEnabled($order = Criteria::ASC) Order by the brand_restriction_enabled column
 * @method     ChildCustomerFamilyQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 * @method     ChildCustomerFamilyQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildCustomerFamilyQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildCustomerFamilyQuery groupById() Group by the id column
 * @method     ChildCustomerFamilyQuery groupByCode() Group by the code column
 * @method     ChildCustomerFamilyQuery groupByCategoryRestrictionEnabled() Group by the category_restriction_enabled column
 * @method     ChildCustomerFamilyQuery groupByBrandRestrictionEnabled() Group by the brand_restriction_enabled column
 * @method     ChildCustomerFamilyQuery groupByIsDefault() Group by the is_default column
 * @method     ChildCustomerFamilyQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildCustomerFamilyQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildCustomerFamilyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustomerFamilyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustomerFamilyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustomerFamilyQuery leftJoinCustomerCustomerFamily($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerCustomerFamily relation
 * @method     ChildCustomerFamilyQuery rightJoinCustomerCustomerFamily($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerCustomerFamily relation
 * @method     ChildCustomerFamilyQuery innerJoinCustomerCustomerFamily($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerCustomerFamily relation
 *
 * @method     ChildCustomerFamilyQuery leftJoinCustomerFamilyPrice($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerFamilyPrice relation
 * @method     ChildCustomerFamilyQuery rightJoinCustomerFamilyPrice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerFamilyPrice relation
 * @method     ChildCustomerFamilyQuery innerJoinCustomerFamilyPrice($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerFamilyPrice relation
 *
 * @method     ChildCustomerFamilyQuery leftJoinCustomerFamilyOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerFamilyOrder relation
 * @method     ChildCustomerFamilyQuery rightJoinCustomerFamilyOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerFamilyOrder relation
 * @method     ChildCustomerFamilyQuery innerJoinCustomerFamilyOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerFamilyOrder relation
 *
 * @method     ChildCustomerFamilyQuery leftJoinCustomerFamilyAvailableCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerFamilyAvailableCategory relation
 * @method     ChildCustomerFamilyQuery rightJoinCustomerFamilyAvailableCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerFamilyAvailableCategory relation
 * @method     ChildCustomerFamilyQuery innerJoinCustomerFamilyAvailableCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerFamilyAvailableCategory relation
 *
 * @method     ChildCustomerFamilyQuery leftJoinCustomerFamilyAvailableBrand($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerFamilyAvailableBrand relation
 * @method     ChildCustomerFamilyQuery rightJoinCustomerFamilyAvailableBrand($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerFamilyAvailableBrand relation
 * @method     ChildCustomerFamilyQuery innerJoinCustomerFamilyAvailableBrand($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerFamilyAvailableBrand relation
 *
 * @method     ChildCustomerFamilyQuery leftJoinCustomerFamilyI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerFamilyI18n relation
 * @method     ChildCustomerFamilyQuery rightJoinCustomerFamilyI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerFamilyI18n relation
 * @method     ChildCustomerFamilyQuery innerJoinCustomerFamilyI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerFamilyI18n relation
 *
 * @method     ChildCustomerFamily findOne(ConnectionInterface $con = null) Return the first ChildCustomerFamily matching the query
 * @method     ChildCustomerFamily findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCustomerFamily matching the query, or a new ChildCustomerFamily object populated from the query conditions when no match is found
 *
 * @method     ChildCustomerFamily findOneById(int $id) Return the first ChildCustomerFamily filtered by the id column
 * @method     ChildCustomerFamily findOneByCode(string $code) Return the first ChildCustomerFamily filtered by the code column
 * @method     ChildCustomerFamily findOneByCategoryRestrictionEnabled(int $category_restriction_enabled) Return the first ChildCustomerFamily filtered by the category_restriction_enabled column
 * @method     ChildCustomerFamily findOneByBrandRestrictionEnabled(int $brand_restriction_enabled) Return the first ChildCustomerFamily filtered by the brand_restriction_enabled column
 * @method     ChildCustomerFamily findOneByIsDefault(int $is_default) Return the first ChildCustomerFamily filtered by the is_default column
 * @method     ChildCustomerFamily findOneByCreatedAt(string $created_at) Return the first ChildCustomerFamily filtered by the created_at column
 * @method     ChildCustomerFamily findOneByUpdatedAt(string $updated_at) Return the first ChildCustomerFamily filtered by the updated_at column
 *
 * @method     array findById(int $id) Return ChildCustomerFamily objects filtered by the id column
 * @method     array findByCode(string $code) Return ChildCustomerFamily objects filtered by the code column
 * @method     array findByCategoryRestrictionEnabled(int $category_restriction_enabled) Return ChildCustomerFamily objects filtered by the category_restriction_enabled column
 * @method     array findByBrandRestrictionEnabled(int $brand_restriction_enabled) Return ChildCustomerFamily objects filtered by the brand_restriction_enabled column
 * @method     array findByIsDefault(int $is_default) Return ChildCustomerFamily objects filtered by the is_default column
 * @method     array findByCreatedAt(string $created_at) Return ChildCustomerFamily objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildCustomerFamily objects filtered by the updated_at column
 *
 */
abstract class CustomerFamilyQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CustomerFamily\Model\Base\CustomerFamilyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CustomerFamily\\Model\\CustomerFamily', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustomerFamilyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustomerFamilyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CustomerFamily\Model\CustomerFamilyQuery) {
            return $criteria;
        }
        $query = new \CustomerFamily\Model\CustomerFamilyQuery();
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
     * @return ChildCustomerFamily|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CustomerFamilyTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustomerFamilyTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildCustomerFamily A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, CODE, CATEGORY_RESTRICTION_ENABLED, BRAND_RESTRICTION_ENABLED, IS_DEFAULT, CREATED_AT, UPDATED_AT FROM customer_family WHERE ID = :p0';
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
            $obj = new ChildCustomerFamily();
            $obj->hydrate($row);
            CustomerFamilyTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCustomerFamily|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
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
    public function findPks($keys, $con = null)
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
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CustomerFamilyTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CustomerFamilyTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CustomerFamilyTableMap::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the category_restriction_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryRestrictionEnabled(1234); // WHERE category_restriction_enabled = 1234
     * $query->filterByCategoryRestrictionEnabled(array(12, 34)); // WHERE category_restriction_enabled IN (12, 34)
     * $query->filterByCategoryRestrictionEnabled(array('min' => 12)); // WHERE category_restriction_enabled > 12
     * </code>
     *
     * @param     mixed $categoryRestrictionEnabled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCategoryRestrictionEnabled($categoryRestrictionEnabled = null, $comparison = null)
    {
        if (is_array($categoryRestrictionEnabled)) {
            $useMinMax = false;
            if (isset($categoryRestrictionEnabled['min'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::CATEGORY_RESTRICTION_ENABLED, $categoryRestrictionEnabled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryRestrictionEnabled['max'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::CATEGORY_RESTRICTION_ENABLED, $categoryRestrictionEnabled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyTableMap::CATEGORY_RESTRICTION_ENABLED, $categoryRestrictionEnabled, $comparison);
    }

    /**
     * Filter the query on the brand_restriction_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByBrandRestrictionEnabled(1234); // WHERE brand_restriction_enabled = 1234
     * $query->filterByBrandRestrictionEnabled(array(12, 34)); // WHERE brand_restriction_enabled IN (12, 34)
     * $query->filterByBrandRestrictionEnabled(array('min' => 12)); // WHERE brand_restriction_enabled > 12
     * </code>
     *
     * @param     mixed $brandRestrictionEnabled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByBrandRestrictionEnabled($brandRestrictionEnabled = null, $comparison = null)
    {
        if (is_array($brandRestrictionEnabled)) {
            $useMinMax = false;
            if (isset($brandRestrictionEnabled['min'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::BRAND_RESTRICTION_ENABLED, $brandRestrictionEnabled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($brandRestrictionEnabled['max'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::BRAND_RESTRICTION_ENABLED, $brandRestrictionEnabled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyTableMap::BRAND_RESTRICTION_ENABLED, $brandRestrictionEnabled, $comparison);
    }

    /**
     * Filter the query on the is_default column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDefault(1234); // WHERE is_default = 1234
     * $query->filterByIsDefault(array(12, 34)); // WHERE is_default IN (12, 34)
     * $query->filterByIsDefault(array('min' => 12)); // WHERE is_default > 12
     * </code>
     *
     * @param     mixed $isDefault The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByIsDefault($isDefault = null, $comparison = null)
    {
        if (is_array($isDefault)) {
            $useMinMax = false;
            if (isset($isDefault['min'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::IS_DEFAULT, $isDefault['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isDefault['max'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::IS_DEFAULT, $isDefault['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyTableMap::IS_DEFAULT, $isDefault, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CustomerFamilyTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \CustomerFamily\Model\CustomerCustomerFamily object
     *
     * @param \CustomerFamily\Model\CustomerCustomerFamily|ObjectCollection $customerCustomerFamily  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCustomerCustomerFamily($customerCustomerFamily, $comparison = null)
    {
        if ($customerCustomerFamily instanceof \CustomerFamily\Model\CustomerCustomerFamily) {
            return $this
                ->addUsingAlias(CustomerFamilyTableMap::ID, $customerCustomerFamily->getCustomerFamilyId(), $comparison);
        } elseif ($customerCustomerFamily instanceof ObjectCollection) {
            return $this
                ->useCustomerCustomerFamilyQuery()
                ->filterByPrimaryKeys($customerCustomerFamily->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerCustomerFamily() only accepts arguments of type \CustomerFamily\Model\CustomerCustomerFamily or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerCustomerFamily relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinCustomerCustomerFamily($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerCustomerFamily');

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
            $this->addJoinObject($join, 'CustomerCustomerFamily');
        }

        return $this;
    }

    /**
     * Use the CustomerCustomerFamily relation CustomerCustomerFamily object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\CustomerCustomerFamilyQuery A secondary query class using the current class as primary query
     */
    public function useCustomerCustomerFamilyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerCustomerFamily($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerCustomerFamily', '\CustomerFamily\Model\CustomerCustomerFamilyQuery');
    }

    /**
     * Filter the query by a related \CustomerFamily\Model\CustomerFamilyPrice object
     *
     * @param \CustomerFamily\Model\CustomerFamilyPrice|ObjectCollection $customerFamilyPrice  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCustomerFamilyPrice($customerFamilyPrice, $comparison = null)
    {
        if ($customerFamilyPrice instanceof \CustomerFamily\Model\CustomerFamilyPrice) {
            return $this
                ->addUsingAlias(CustomerFamilyTableMap::ID, $customerFamilyPrice->getCustomerFamilyId(), $comparison);
        } elseif ($customerFamilyPrice instanceof ObjectCollection) {
            return $this
                ->useCustomerFamilyPriceQuery()
                ->filterByPrimaryKeys($customerFamilyPrice->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerFamilyPrice() only accepts arguments of type \CustomerFamily\Model\CustomerFamilyPrice or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerFamilyPrice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinCustomerFamilyPrice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerFamilyPrice');

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
            $this->addJoinObject($join, 'CustomerFamilyPrice');
        }

        return $this;
    }

    /**
     * Use the CustomerFamilyPrice relation CustomerFamilyPrice object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\CustomerFamilyPriceQuery A secondary query class using the current class as primary query
     */
    public function useCustomerFamilyPriceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerFamilyPrice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerFamilyPrice', '\CustomerFamily\Model\CustomerFamilyPriceQuery');
    }

    /**
     * Filter the query by a related \CustomerFamily\Model\CustomerFamilyOrder object
     *
     * @param \CustomerFamily\Model\CustomerFamilyOrder|ObjectCollection $customerFamilyOrder  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCustomerFamilyOrder($customerFamilyOrder, $comparison = null)
    {
        if ($customerFamilyOrder instanceof \CustomerFamily\Model\CustomerFamilyOrder) {
            return $this
                ->addUsingAlias(CustomerFamilyTableMap::ID, $customerFamilyOrder->getCustomerFamilyId(), $comparison);
        } elseif ($customerFamilyOrder instanceof ObjectCollection) {
            return $this
                ->useCustomerFamilyOrderQuery()
                ->filterByPrimaryKeys($customerFamilyOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerFamilyOrder() only accepts arguments of type \CustomerFamily\Model\CustomerFamilyOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerFamilyOrder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinCustomerFamilyOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerFamilyOrder');

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
            $this->addJoinObject($join, 'CustomerFamilyOrder');
        }

        return $this;
    }

    /**
     * Use the CustomerFamilyOrder relation CustomerFamilyOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\CustomerFamilyOrderQuery A secondary query class using the current class as primary query
     */
    public function useCustomerFamilyOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerFamilyOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerFamilyOrder', '\CustomerFamily\Model\CustomerFamilyOrderQuery');
    }

    /**
     * Filter the query by a related \CustomerFamily\Model\CustomerFamilyAvailableCategory object
     *
     * @param \CustomerFamily\Model\CustomerFamilyAvailableCategory|ObjectCollection $customerFamilyAvailableCategory  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCustomerFamilyAvailableCategory($customerFamilyAvailableCategory, $comparison = null)
    {
        if ($customerFamilyAvailableCategory instanceof \CustomerFamily\Model\CustomerFamilyAvailableCategory) {
            return $this
                ->addUsingAlias(CustomerFamilyTableMap::ID, $customerFamilyAvailableCategory->getCustomerFamilyId(), $comparison);
        } elseif ($customerFamilyAvailableCategory instanceof ObjectCollection) {
            return $this
                ->useCustomerFamilyAvailableCategoryQuery()
                ->filterByPrimaryKeys($customerFamilyAvailableCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerFamilyAvailableCategory() only accepts arguments of type \CustomerFamily\Model\CustomerFamilyAvailableCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerFamilyAvailableCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinCustomerFamilyAvailableCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerFamilyAvailableCategory');

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
            $this->addJoinObject($join, 'CustomerFamilyAvailableCategory');
        }

        return $this;
    }

    /**
     * Use the CustomerFamilyAvailableCategory relation CustomerFamilyAvailableCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\CustomerFamilyAvailableCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCustomerFamilyAvailableCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerFamilyAvailableCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerFamilyAvailableCategory', '\CustomerFamily\Model\CustomerFamilyAvailableCategoryQuery');
    }

    /**
     * Filter the query by a related \CustomerFamily\Model\CustomerFamilyAvailableBrand object
     *
     * @param \CustomerFamily\Model\CustomerFamilyAvailableBrand|ObjectCollection $customerFamilyAvailableBrand  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCustomerFamilyAvailableBrand($customerFamilyAvailableBrand, $comparison = null)
    {
        if ($customerFamilyAvailableBrand instanceof \CustomerFamily\Model\CustomerFamilyAvailableBrand) {
            return $this
                ->addUsingAlias(CustomerFamilyTableMap::ID, $customerFamilyAvailableBrand->getCustomerFamilyId(), $comparison);
        } elseif ($customerFamilyAvailableBrand instanceof ObjectCollection) {
            return $this
                ->useCustomerFamilyAvailableBrandQuery()
                ->filterByPrimaryKeys($customerFamilyAvailableBrand->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerFamilyAvailableBrand() only accepts arguments of type \CustomerFamily\Model\CustomerFamilyAvailableBrand or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerFamilyAvailableBrand relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinCustomerFamilyAvailableBrand($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerFamilyAvailableBrand');

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
            $this->addJoinObject($join, 'CustomerFamilyAvailableBrand');
        }

        return $this;
    }

    /**
     * Use the CustomerFamilyAvailableBrand relation CustomerFamilyAvailableBrand object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\CustomerFamilyAvailableBrandQuery A secondary query class using the current class as primary query
     */
    public function useCustomerFamilyAvailableBrandQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerFamilyAvailableBrand($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerFamilyAvailableBrand', '\CustomerFamily\Model\CustomerFamilyAvailableBrandQuery');
    }

    /**
     * Filter the query by a related \CustomerFamily\Model\CustomerFamilyI18n object
     *
     * @param \CustomerFamily\Model\CustomerFamilyI18n|ObjectCollection $customerFamilyI18n  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function filterByCustomerFamilyI18n($customerFamilyI18n, $comparison = null)
    {
        if ($customerFamilyI18n instanceof \CustomerFamily\Model\CustomerFamilyI18n) {
            return $this
                ->addUsingAlias(CustomerFamilyTableMap::ID, $customerFamilyI18n->getId(), $comparison);
        } elseif ($customerFamilyI18n instanceof ObjectCollection) {
            return $this
                ->useCustomerFamilyI18nQuery()
                ->filterByPrimaryKeys($customerFamilyI18n->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerFamilyI18n() only accepts arguments of type \CustomerFamily\Model\CustomerFamilyI18n or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerFamilyI18n relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinCustomerFamilyI18n($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerFamilyI18n');

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
            $this->addJoinObject($join, 'CustomerFamilyI18n');
        }

        return $this;
    }

    /**
     * Use the CustomerFamilyI18n relation CustomerFamilyI18n object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\CustomerFamilyI18nQuery A secondary query class using the current class as primary query
     */
    public function useCustomerFamilyI18nQuery($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        return $this
            ->joinCustomerFamilyI18n($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerFamilyI18n', '\CustomerFamily\Model\CustomerFamilyI18nQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCustomerFamily $customerFamily Object to remove from the list of results
     *
     * @return ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function prune($customerFamily = null)
    {
        if ($customerFamily) {
            $this->addUsingAlias(CustomerFamilyTableMap::ID, $customerFamily->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the customer_family table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerFamilyTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustomerFamilyTableMap::clearInstancePool();
            CustomerFamilyTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCustomerFamily or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCustomerFamily object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerFamilyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustomerFamilyTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        CustomerFamilyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustomerFamilyTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CustomerFamilyTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CustomerFamilyTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CustomerFamilyTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CustomerFamilyTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CustomerFamilyTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CustomerFamilyTableMap::CREATED_AT);
    }

    // i18n behavior

    /**
     * Adds a JOIN clause to the query using the i18n relation
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinI18n($locale = 'en_US', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $relationName = $relationAlias ? $relationAlias : 'CustomerFamilyI18n';

        return $this
            ->joinCustomerFamilyI18n($relationAlias, $joinType)
            ->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
    }

    /**
     * Adds a JOIN clause to the query and hydrates the related I18n object.
     * Shortcut for $c->joinI18n($locale)->with()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildCustomerFamilyQuery The current query, for fluid interface
     */
    public function joinWithI18n($locale = 'en_US', $joinType = Criteria::LEFT_JOIN)
    {
        $this
            ->joinI18n($locale, null, $joinType)
            ->with('CustomerFamilyI18n');
        $this->with['CustomerFamilyI18n']->setIsWithOneToMany(false);

        return $this;
    }

    /**
     * Use the I18n relation query object
     *
     * @see       useQuery()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildCustomerFamilyI18nQuery A secondary query class using the current class as primary query
     */
    public function useI18nQuery($locale = 'en_US', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinI18n($locale, $relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerFamilyI18n', '\CustomerFamily\Model\CustomerFamilyI18nQuery');
    }

} // CustomerFamilyQuery
