<?php


namespace AppBundle\Manager;


use AppBundle\Entity\CustomerData;
use AppBundle\Entity\DeliveryMethod;
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
        $deliveryMethod = $this->doctrine->getRepository(DeliveryMethod::class)->find($params['deliveryMethod']);
        $order->setDeliveryMethod($deliveryMethod);
        $this->doctrine->persist($order);
        $this->doctrine->flush();
        return true;
    }

    public function edit(Orders $old, array $params): bool
    {
        $old->setOrderDescription($params['order_description']);
        $old->setProducts($params['products']);
        $old->setStatus($params['status']);
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