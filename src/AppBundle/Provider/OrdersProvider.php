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

class OrdersProvider extends Provider implements ProviderStrategy
{
    public function getAll(): array
    {
        $orders = $this->_doctrine->getRepository(Orders::class)->findAll();
        return $orders;
    }

    public function getSingle(int $id)
    {
        $order = $this->_doctrine->getRepository(Orders::class)->find($id);
        if (!$order)
            throw new NotFoundHttpException();
        return $order;
    }

    public function getAllUsers(int $id): array
    {
        $orders = $this->_doctrine->getRepository(Orders::class)->findBy(["user" => $id]);
        return $orders;
    }

}