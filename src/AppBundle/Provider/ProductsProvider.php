<?php


namespace AppBundle\Provider;


use AppBundle\Entity\Products;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ProductsProvider
 * @package AppBundle\Provider
 */
class ProductsProvider extends Provider implements ProviderInterface
{
    /**
     * This method return all products
     *
     * @return array
     */
    public function getAll(): array
    {
        $products = $this->_doctrine->getRepository(Products::class)->getAll();
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
        $products = $this->_doctrine->getRepository(Products::class)->getAll_SortByPrize($method);
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
     * This method return all brands products
     *
     * @param int $id
     *
     * @return array
     */
    public function getAllBrandsProducts(int $id): array
    {
        $products = $this->_doctrine->getRepository(Products::class)->getAllBrandProducts($id);
        return $products;
    }

    /**
     * This method return all brands products and sort him by prize
     *
     * @param int $id
     *
     * @return array
     */
    public function getAllBrandsProduct_SortByPrize(int $id, string $sort): array
    {
        $products = $this->_doctrine->getRepository(Products::class)->getAllBrandsProduct_SortByPrize($id, $sort);
        return $products;
    }

    /**
     * This method return all products of category
     *
     * @param int $id category id
     * @return array
     */
    public function getAllCategoryProducts(int $id): array
    {
        $products = $this->_doctrine->getRepository(Products::class)->getAllCategoryProducts($id);
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
        $products = $this->_doctrine->getRepository(Products::class)->getAllCategoryProducts_SortByPrize($id, $sort);
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