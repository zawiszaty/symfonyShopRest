<?php


namespace AppBundle\Provider;


use AppBundle\Entity\Products;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ProductsProvider
 * @package AppBundle\Provider
 */
class ProductsProvider extends Provider implements ProviderStrategy
{
    /**
     * This method return all products
     *
     * @return array
     */
    public function getAll(): array
    {
        $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')
            ->orderBy('p.idproducts', 'DESC')->getQuery()->getResult();
        return $products;
    }

    /**
     * This method return all products and sort him by prize
     *
     * @param string $method sort method
     * @return array
     */
    public function getAllSortByPrize(string $method): array
    {
        $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')
            ->orderBy('p.productAmount', $method)->getQuery()->getResult();

        return $products;
    }

    /**
     * This method return one products
     *
     * @param int $id products id
     * @return Products
     */
    public function getSingle(int $id): Products
    {
        $products = $this->_doctrine->getRepository(Products::class)->find($id);

        if (!$products)
            throw new NotFoundHttpException();

        return $products;
    }

    /**
     * This method return all brands products and sort him by prize or time
     *
     * @param int $id
     * @param string $sort sort method
     *
     * @return array
     */
    public function getAllBrands(int $id, string $sort): array
    {
        if ($sort == 1) {

            $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')->where('p.brandsbrand = :id')
                ->orderBy('p.idproducts', 'DESC')->setParameter('id', $id)
                ->getQuery()->getResult();

        } else if ($sort == 2) {

            $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')->where('p.brandsbrand = :id')
                ->orderBy('p.productAmount', 'ASC')->setParameter('id', $id)
                ->getQuery()->getResult();

        } else {

            $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')->where('p.brandsbrand = :id')
                ->orderBy('p.productAmount', 'DESC')->setParameter('id', $id)
                ->getQuery()->getResult();

        }

        if (!$products)
            throw new NotFoundHttpException();

        return $products;
    }

    /**
     * This method return all categories products and sort him by prize or time
     *
     * @param int $id category id
     * @param int $sort sort method
     * @return array
     */
    public function getAllCategories(int $id, int $sort): array
    {
        if ($sort == 1) {

            $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')->where('p.categoriescategory = :id')
                ->orderBy('p.idproducts', 'DESC')->setParameter('id', $id)
                ->getQuery()->getResult();

        } else if ($sort == 2) {

            $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')->where('p.categoriescategory = :id')
                ->orderBy('p.productAmount', 'ASC')->setParameter('id', $id)
                ->getQuery()->getResult();

        } else {

            $products = $this->_doctrine->createQueryBuilder()->select('p')->from('AppBundle:Products', 'p')->where('p.categoriescategory = :id')
                ->orderBy('p.productAmount', 'DESC')->setParameter('id', $id)
                ->getQuery()->getResult();

        }

        if (!$products)
            throw new NotFoundHttpException();

        return $products;
    }

    /**
     * This method return all products in order
     *
     * @param string $products string with products id
     * @return array
     */
    public function getAllOrders(string $products): array
    {
        $products = explode(',', $products);
        unset($products[count($products) - 1]);
        $ordersProduct = [];

        foreach ($products as $item) {
            $product = $this->_doctrine->getRepository(Products::class)->find($item);
            $ordersProduct[] = $product;
        }

        return $ordersProduct;
    }

}