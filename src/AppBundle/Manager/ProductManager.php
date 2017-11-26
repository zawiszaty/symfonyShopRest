<?php


namespace AppBundle\Manager;


use AppBundle\Entity\Brands;
use AppBundle\Entity\Categories;
use AppBundle\Entity\Products;

class ProductManager extends Manager
{
    public function add(array $params): bool
    {
        $product = new Products();
        $product->setProductName($params['productName']);
        $product->setProductDescription($params['productDescription']);
        $product->setProductSize($params['productSize']);
        $product->setProductAmount($params['productAmount']);
        $product->setMiniature($params['miniature']);
        $brand = $this->doctrine->getRepository(Brands::class)->find($params['brandsbrand']);
        $product->setBrandsbrand($brand);
        $category = $this->doctrine->getRepository(Categories::class)->find($params['categoriescategory']);
        $product->setCategoriescategory($category);
        $this->doctrine->persist($product);
        $this->doctrine->flush();
        return true;
    }

    public function edit(Products $old, array $params): bool
    {

        $old->setProductName($params['productName']);
        $old->setProductDescription($params['productDescription']);
        $old->setProductSize($params['productSize']);
        $old->setProductAmount($params['productAmount']);
        $old->setMiniature($params['miniature']);
        $brand = $this->doctrine->getRepository(Brands::class)->find($params['brandsbrand']);
        $old->setBrandsbrand($brand);
        $category = $this->doctrine->getRepository(Categories::class)->find($params['categoriescategory']);
        $old->setCategoriescategory($category);
        $this->doctrine->flush();
        return true;
    }

    public function del(int $id): bool
    {
        $productCustomerData = $this->doctrine->getRepository(Products::class)->find($id);
        $this->doctrine->remove($productCustomerData);
        $this->doctrine->flush();
        return true;
    }
}