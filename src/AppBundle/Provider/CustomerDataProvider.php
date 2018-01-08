<?php


namespace AppBundle\Provider;

use AppBundle\Entity\CustomerData;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CustomerDataProvider
 * @package AppBundle\Provider
 */
class CustomerDataProvider extends Provider implements ProviderStrategy
{
    /**
     * This method return all customer data
     *
     * @return array
     */
    public function getAll(): array
    {
        $customerData = $this->_doctrine->getRepository(CustomerData::class)->findAll();

        return $customerData;
    }

    /**
     * This method return one customer data
     *
     * @param int $id customer data id
     * @return CustomerData|null|object
     */
    public function getSingle(int $id)
    {
        $customerData = $this->_doctrine->getRepository(CustomerData::class)->find($id);
        if (!$customerData)
            throw new NotFoundHttpException();
        return $customerData;
    }

    /**
     * This method return all users customer data
     *
     * @param int $id user id
     *
     * @return array
     */
    public function getAllUsers(int $id): array
    {
        $customerData = $this->_doctrine->getRepository(CustomerData::class)->createQueryBuilder('p')
            ->where('p.archived != 1')->andWhere('p.user = :id')->setParameter('id', $id)->getQuery()->getResult();

        return $customerData;
    }
}