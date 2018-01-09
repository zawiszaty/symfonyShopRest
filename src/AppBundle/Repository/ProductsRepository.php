<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class ProductsRepository
 * @package AppBundle\Repository
 */
class ProductsRepository extends EntityRepository
{

    /**
     * This method return all product
     *
     * @return array
     */
    public function getAll(): array
    {
        $products = $this->createQueryBuilder('p')
            ->addOrderBy('p.idproducts', 'DESC')
            ->getQuery()
            ->getResult();

        return $products;
    }

    /**
     * This method return all product and sort him by prize
     *
     * @param string $method
     * @return array
     */
    public function getAll_SortByPrize(string $method): array
    {
        $products = $this->createQueryBuilder('p')
            ->addOrderBy('p.productAmount', $method)
            ->getQuery()
            ->getResult();

        return $products;
    }

    /**
     * This method return all products of brand
     *
     * @param int $id
     * @return array
     */
    public function getAllBrandProducts(int $id): array
    {
        $products = $this->createQueryBuilder('p')
            ->where('p.brandsbrand = :id')
            ->addOrderBy('p.idproducts', 'DESC')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $products;
    }

    /**
     * This method return all products of brand and sort him by prize
     *
     * @param int $id
     * @param string $sort
     *
     * @return array
     */
    public function getAllBrandsProduct_SortByPrize(int $id, string $sort): array
    {
        $products = $this->createQueryBuilder('p')
            ->where('p.brandsbrand = :id')
            ->addOrderBy('p.productAmount', $sort)
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $products;
    }

    /**
     * This method return all products of category
     *
     * @param int $id
     * @return array
     */
    public function getAllCategoryProducts(int $id): array
    {
        $products = $this->createQueryBuilder('p')
            ->where('p.categoriescategory = :id')
            ->addOrderBy('p.idproducts', 'DESC')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $products;
    }

    /**
     * This method return all products of category and sort him by prize
     *
     * @param int $id
     * @param string $sort
     * @return array
     */
    public function getAllCategoryProducts_SortByPrize(int $id, string $sort): array
    {
        $products = $this->createQueryBuilder('p')
            ->where('p.categoriescategory = :id')
            ->addOrderBy('p.productAmount', $sort)
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $products;
    }


}