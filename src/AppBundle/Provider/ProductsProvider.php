<?php


namespace AppBundle\Provider;


use AppBundle\Entity\Products;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsProvider extends Provider implements ProviderStrategy
{
    public function getAll(): array
    {
        $products = $this->_doctrine->getRepository(Products::class)->findAll();
        return $products;
    }

    public function getSingle(int $id): Products
    {
        $products = $this->_doctrine->getRepository(Products::class)->find($id);
        if (!$products)
            throw new NotFoundHttpException();
        return $products;
    }

}