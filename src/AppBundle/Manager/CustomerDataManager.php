<?php


namespace AppBundle\Manager;


use AppBundle\Entity\CustomerData;
use AppBundle\Entity\User;

/**
 * Class CustomerDataManager
 * @package AppBundle\Manager
 */
class CustomerDataManager extends Manager
{
    use ManagerStrategy;

    /**
     * @param array $params
     * @return bool
     */
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

    /**
     * @param CustomerData $old
     * @param array $params
     * @return bool
     */
    public function edit(CustomerData $old, array $params): bool
    {
        $old->setCity($params['city']);
        $old->setHouseNumber($params['house_number']);
        $old->setStreet($params['street']);

        $this->doctrine->flush();

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function del(int $id): bool
    {
        $deleteCustomerData = $this->doctrine->getRepository(CustomerData::class)->find($id);
        $deleteCustomerData->setArchived(1);

        $this->doctrine->flush();

        return true;
    }
}