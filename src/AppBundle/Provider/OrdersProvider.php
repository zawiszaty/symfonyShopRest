<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 22.11.2017
 * Time: 19:36
 */

namespace AppBundle\Provider;


use AppBundle\Entity\Orders;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class OrdersProvider
 * @package AppBundle\Provider
 */
class OrdersProvider extends Provider implements ProviderStrategy
{
    /**
     * This method return all orders
     *
     * @return array
     */
    public function getAll(): array
    {
        $orders = $this->_doctrine->getRepository(Orders::class)->createQueryBuilder('p')
            ->where('p.status = :submitted')->setParameter('submitted', 'submitted')
            ->orWhere('p.status = :send')->setParameter('send', 'send')->getQuery()->getResult();

        return $orders;
    }

    /**
     * This method return one order
     *
     * @param int $id order id
     * @return Orders|null|object
     */
    public function getSingle(int $id)
    {
        $order = $this->_doctrine->getRepository(Orders::class)->find($id);

        if (!$order)
            throw new NotFoundHttpException();

        return $order;
    }

    /**
     * This method return all users orders
     *
     * @param int $id user id
     * @return array
     */
    public function getAllUsers(int $id): array
    {
        $orders = $this->_doctrine->getRepository(Orders::class)->findBy(["user" => $id]);

        return $orders;
    }

}