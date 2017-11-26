<?php


namespace AppBundle\Manager;


use AppBundle\Entity\CustomerData;
use AppBundle\Entity\Orders;

class CustomerDataManager extends Manager
{
    public function add(array $params): bool
    {
        $customerData = new CustomerData();
        $customerData->setCity($params['city']);
        $customerData->setHouseNumber($params['houseNumber']);
        $customerData->setStreet($params['street']);
        $this->doctrine->persist($customerData);
        $this->doctrine->flush();
        return true;
    }

    public function edit(CustomerData $old, array $params): bool
    {
        $old->setCity($params['city']);
        $old->setHouseNumber($params['houseNumber']);
        $old->setStreet($params['street']);
        $this->doctrine->flush();
        return true;
    }

    public function del(int $id): bool
    {
        $deleteCustomerData = $this->doctrine->getRepository(CustomerData::class)->find($id);
        $orders = $this->doctrine->getRepository(Orders::class)->findBy(['customerData' => $id]);
        foreach ($orders as $item) {
            $this->doctrine->remove($item);
        }
        $this->doctrine->remove($deleteCustomerData);
        $this->doctrine->flush();
        return true;
    }
}