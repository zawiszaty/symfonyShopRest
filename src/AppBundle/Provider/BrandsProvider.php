<?php


namespace AppBundle\Provider;


use AppBundle\Entity\Brands;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class BrandsProvider
 * @package AppBundle\Provider
 */
class BrandsProvider extends Provider implements ProviderInterface
{

    /**
     * This method return all brands
     *
     * @return array
     */
    public function getAll(): array
    {
        $brands = $this->_doctrine->getRepository(Brands::class)->findAll();

        return $brands;
    }

    /**
     * This method return single brand
     *
     * @param int $id
     * @return Brands
     */
    public function getSingle(int $id): Brands
    {
        $brand = $this->_doctrine->getRepository(Brands::class)->find($id);

        if (!$brand)
            throw new NotFoundHttpException();

        return $brand;
    }

}