<?php


namespace AppBundle\Manager;


use AppBundle\Entity\Brands;
use Proxies\__CG__\AppBundle\Entity\Products;

/**
 * Class BrandsManager
 * @package AppBundle\Manager
 */
class BrandsManager extends Manager
{
    use ManagerStrategy;

    /**
     * @param array $params
     * @return bool
     */
    public function add(array $params): bool
    {
        $brand = new Brands();
        $brand->setBrandName($params['brand_name']);

        $this->doctrine->persist($brand);
        $this->doctrine->flush();

        return true;
    }

    /**
     * @param Brands $old
     * @param array $params
     * @return bool
     */
    public function edit(Brands $old, array $params): bool
    {
        $old->setBrandName($params['brand_name']);

        $this->doctrine->flush();

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $products = $this->doctrine->getRepository(Products::class)->findBy(['brandsbrand' => $id]);
        $defaultBrands = $this->doctrine->getRepository(Brands::class)->find(3);

        foreach ($products as $item) {
            $item->setBrandsbrand($defaultBrands);
        }

        $deleteProduct = $this->doctrine->getRepository(Brands::class)->find($id);

        $this->doctrine->remove($deleteProduct);
        $this->doctrine->flush();
        return true;

    }


}