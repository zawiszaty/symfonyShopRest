<?php


namespace AppBundle\Manager;


use AppBundle\Entity\CustomerData;
use AppBundle\Entity\Orders;
use AppBundle\Entity\User;

class CustomerDataManager extends Manager
{
    public function add(array $params): bool
    {
        $customerData = new CustomerData();
        $customerData->setCity($params['city']);
        $customerData->setHouseNumber($params['houseNumber']);
        $customerData->setStreet($params['street']);
        $user = $this->doctrine->getRepository(User::class)->find($params['user']);
        $customerData->setUser($user);
        $this->doctrine->persist($customerData);
        $this->doctrine->flush();
        return true;
    }

    public function edit(CustomerData $old, array $params): bool
    {
        $old->setCity($params['city']);
        $old->setHouseNumber($params['house_number']);
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