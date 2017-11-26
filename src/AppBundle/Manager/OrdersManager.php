<?php


namespace AppBundle\Manager;


use AppBundle\Entity\CustomerData;
use AppBundle\Entity\Orders;
use AppBundle\Entity\Products;

class OrdersManager extends Manager
{
    public function add(array $params): bool
    {
        $order = new Orders();
        $customerData = $this->doctrine->getRepository(CustomerData::class)->find($params['customerData']);
        $order->setCustomerData($customerData);
        $order->setOrderDescription($params['orderDescription']);
        $product = $this->doctrine->getRepository(Products::class)->find($params['productsproducts']);
        $order->setProductsproducts($product);
        $this->doctrine->persist($order);
        $this->doctrine->flush();
        return true;
    }

    public function edit(Orders $old, array $params): bool
    {
        $customerData = $this->doctrine->getRepository(CustomerData::class)->find($params['customerData']);
        $old->setCustomerData($customerData);
        $old->setOrderDescription($params['orderDescription']);
        $product = $this->doctrine->getRepository(Products::class)->find($params['productsproducts']);
        $old->setProductsproducts($product);
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