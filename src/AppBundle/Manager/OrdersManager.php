<?php


namespace AppBundle\Manager;


use AppBundle\Entity\CustomerData;
use AppBundle\Entity\Orders;
use AppBundle\Entity\User;

class OrdersManager extends Manager
{
    public function add(array $params): bool
    {
        $order = new Orders();
        $customerData = $this->doctrine->getRepository(CustomerData::class)->find($params['customerData']);
        $order->setCustomerData($customerData);
        $order->setOrderDescription($params['orderDescription']);
        $order->setProducts($params['productsproducts']);
        $user = $this->doctrine->getRepository(User::class)->find($params['user']);
        $order->setUser($user);
        $order->setOrdersPrize($params['orderPrize']);
        $order->setOrderSize($params['orderSize']);
        $order->setDeliveryMethod($params['deliveryMethod']);
        $this->doctrine->persist($order);
        $this->doctrine->flush();
        return true;
    }

    public function edit(Orders $old, array $params): bool
    {
        $customerData = $this->doctrine->getRepository(CustomerData::class)->find($params['customerData']);
        $old->setCustomerData($customerData);
        $old->setOrderDescription($params['orderDescription']);
        $old->setProducts($params['productsproducts']);
        $this->doctrine->flush();
        return true;
    }

    public function del(int $id): bool
    {
        $delOrders = $this->doctrine->getRepository(Orders::class)->find($id);
        $this->doctrine->remove($delOrders);
        $this->doctrine->flush();
        return true;
    }


}