<?php


namespace AppBundle\Manager;


use AppBundle\Entity\Brands;
use AppBundle\Entity\Categories;
use AppBundle\Entity\Products;

/**
 * Class ProductManager
 * @package AppBundle\Manager
 */
class ProductManager extends Manager
{
    use ManagerTrait;

    /**
     * This method add new product
     *
     * @param array $params
     * @param $nameMiniature
     * @return bool
     */
    public function add(array $params, $nameMiniature): bool
    {
        $product = new Products();
        $product->setProductName($params['product_name']);
        $product->setProductDescription($params['product_description']);
        $product->setProductSize($params['product_size']);
        $product->setProductAmount($params['product_amount']);
        $product->setMiniature($nameMiniature);
        $brand = $this->doctrine->getRepository(Brands::class)->find($params['brandsbrand']);
        $product->setBrandsbrand($brand);
        $category = $this->doctrine->getRepository(Categories::class)->find($params['categoriescategory']);
        $product->setCategoriescategory($category);

        $this->doctrine->persist($product);
        $this->doctrine->flush();

        return true;
    }

    /**
     * This method edit existing product
     *
     * @param Products $old
     * @param array $params
     * @param string $name
     * @return bool
     */
    public function edit(Products $old, array $params, string $name): bool
    {
        $old->setProductName($params['product_name']);
        $old->setProductDescription($params['product_description']);
        $old->setProductSize($params['product_size']);
        $old->setProductAmount($params['product_amount']);
        $old->setMiniature($name);
        $brand = $this->doctrine->getRepository(Brands::class)->find($params['brandsbrand']);
        $old->setBrandsbrand($brand);
        $category = $this->doctrine->getRepository(Categories::class)->find($params['categoriescategory']);
        $old->setCategoriescategory($category);

        $this->doctrine->flush();

        return true;
    }

    /**
     * This method del existing product
     *
     * @param int $id
     * @return bool
     */
    public function del(int $id): bool
    {
        $productCustomerData = $this->doctrine->getRepository(Products::class)->find($id);

        $this->doctrine->remove($productCustomerData);
        $this->doctrine->flush();

        return true;
    }
}