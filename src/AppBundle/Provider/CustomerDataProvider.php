<?php


namespace AppBundle\Provider;

use AppBundle\Entity\CustomerData;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomerDataProvider extends Provider implements ProviderStrategy
{
    public function getAll(): array
    {
        $customerData = $this->_doctrine->getRepository(CustomerData::class)->findAll();
        return $customerData;
    }

    public function getSingle(int $id)
    {
        $customerData = $this->_doctrine->getRepository(CustomerData::class)->find($id);
        if (!$customerData)
            throw new NotFoundHttpException();
        return $customerData;
    }

    public function getAllUsers(int $id): array
    {
        $customerData = $this->_doctrine->getRepository(CustomerData::class)->findBy(['user' => $id]);
        return $customerData;
    }
}