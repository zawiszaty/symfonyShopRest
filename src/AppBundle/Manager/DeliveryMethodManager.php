<?php


namespace AppBundle\Manager;


use AppBundle\Entity\DeliveryMethod;

/**
 * Class DeliveryMethodManager
 * @package AppBundle\Manager
 */
class DeliveryMethodManager extends Manager
{
    use ManagerTrait;

    /**
     * This method add new delivery method
     *
     * @param array $params
     * @return bool
     */
    public function add(array $params)
    {
        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->setMethods($params['methods']);
        $deliveryMethod->setMethodsPrize($params['methods_prize']);

        $this->doctrine->persist($deliveryMethod);
        $this->doctrine->flush();

        return true;
    }

    /**
     * This method edit existing delivery method
     *
     * @param DeliveryMethod $old
     * @param array $params
     * @return bool
     */
    public function edit(DeliveryMethod $old, array $params): bool
    {
        $old->setMethods($params['methods']);
        $old->setMethodsPrize($params['methods_prize']);

        $this->doctrine->flush();

        return true;
    }

    /**
     * This method del existing delivery method
     *
     * @param int $id
     * @return bool
     */
    public function del(int $id)
    {
        $delDeliveryMethods = $this->doctrine->getRepository(DeliveryMethod::class)->find($id);
        $delDeliveryMethods->setArchived(1);

        $this->doctrine->flush();

        return true;
    }
}