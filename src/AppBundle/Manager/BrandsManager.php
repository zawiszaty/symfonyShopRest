<?php


namespace AppBundle\Manager;


use AppBundle\Entity\Brands;
use Proxies\__CG__\AppBundle\Entity\Products;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BrandsManager extends Manager
{
    public function add(array $params): bool
    {
        $brand = new Brands();
        $brand->setBrandName($params['brand_name']);
        $this->doctrine->persist($brand);
        $this->doctrine->flush();
        return true;
    }

    public function edit(Brands $old, array $params): bool
    {
        $old->setBrandName($params['brand_name']);
        $this->doctrine->flush();
        return true;
    }

    public function delete(int $id): bool
    {
        $products = $this->doctrine->getRepository(Products::class)->findBy(['brandsbrand'=> $id]);
        $defaultBrands = $this->doctrine->getRepository(Brands::class)->find(3);
        foreach ($products as $item)
        {
         $item->setBrandsbrand($defaultBrands);
        }
        $deleteProduct = $this->doctrine->getRepository(Brands::class)->find($id);
        $this->doctrine->remove($deleteProduct);
        $this->doctrine->flush();
        return true;

    }


}