<?php


namespace AppBundle\Provider;


use AppBundle\Entity\DeliveryMethod;

/**
 * Class DeliveryMethodsProvider
 *
 * @package AppBundle\Provider
 */
class DeliveryMethodsProvider extends Provider implements ProviderStrategy
{
    /**
     * This method return single delivery method
     *
     * @return array
     */
    public function getAll(): array
    {
        $deliveryMethods = $this->_doctrine->getRepository(DeliveryMethod::class)->createQueryBuilder('p')
            ->where('p.archived != 1')->getQuery()->getResult();

        return $deliveryMethods;
    }

    /**
     * This method return single delivery method
     *
     * @param int $id
     * @return DeliveryMethod|null|object
     */
    public function getSingle(int $id)
    {
        $deliveryMethods = $this->_doctrine->getRepository(DeliveryMethod::class)->find($id);

        if (!$deliveryMethods)
            throw new NotFoundHttpException();

        return $deliveryMethods;
    }

}