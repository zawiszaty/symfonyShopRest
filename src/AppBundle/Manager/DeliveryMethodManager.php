<?php


namespace AppBundle\Manager;


use AppBundle\Entity\DeliveryMethod;

class DeliveryMethodManager extends Manager
{
    use ManagerStrategy;

    public function add(array $params)
    {
        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->setMethods($params['methods']);
        $deliveryMethod->setMethodsPrize($params['methods_prize']);
        $this->doctrine->persist($deliveryMethod);
        $this->doctrine->flush();
        return true;
    }

    public function edit(DeliveryMethod $old, array $params): bool
    {
        $old->setMethods($params['methods']);
        $old->setMethodsPrize($params['methods_prize']);
        $this->doctrine->flush();
        return true;
    }

    public function del(int $id)
    {
        $delDeliveryMethods = $this->doctrine->getRepository(DeliveryMethod::class)->find($id);
        $delDeliveryMethods->setArchived(1);
        $this->doctrine->flush();
        return true;
    }
}