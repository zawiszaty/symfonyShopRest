<?php


namespace AppBundle\Provider;


use AppBundle\Entity\DeliveryMethod;

class DeliveryMethodsProvider extends Provider implements ProviderStrategy
{
    public function getAll(): array
    {
        $deliveryMethods = $this->_doctrine->getRepository(DeliveryMethod::class)->createQueryBuilder('p')
            ->where('p.archived != 1')->getQuery()->getResult();
        return $deliveryMethods;
    }

    public function getSingle(int $id)
    {
        $deliveryMethods = $this->_doctrine->getRepository(DeliveryMethod::class)->find($id);
        if (!$deliveryMethods)
            throw new NotFoundHttpException();
        return $deliveryMethods;
    }

}