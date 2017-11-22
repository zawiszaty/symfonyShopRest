<?php


namespace AppBundle\Provider;


use AppBundle\Entity\Brands;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BrandsProvider extends Provider implements ProviderStrategy
{
    public function __construct(EntityManager $doctrine)
    {
        parent::__construct($doctrine);
    }

    public function getAll(): array
    {
        $brands = $this->_doctrine->getRepository(Brands::class)->findAll();
        return $brands;
    }

    public function getSingle(int $id): Brands
    {
        $brand = $this->_doctrine->getRepository(Brands::class)->find($id);
        if (!$brand)
            throw new NotFoundHttpException();
        return $brand;
    }

}