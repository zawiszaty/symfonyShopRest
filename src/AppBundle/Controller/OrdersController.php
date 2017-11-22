<?php


namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends FOSRestController
{
    /**
     * This class return all orders
     *
     * @Rest\Get("/api/get/all/orders")
     *
     * @return Response
     */
    public function getAllOrders(): Response
    {
        $ordersProvider = $this->get('AppBundle\Provider\OrdersProvider');
        $orders = $ordersProvider->getAll();
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($orders, 'json');
        $view = $this->view($orders, 200);
        return $this->handleView($view);
    }

    /**
     * This class return only one order
     *
     * @Rest\Get("/api/get/{id}/order")
     *
     * @return Response
     */
    public function getSingleOrder(int $id): Response
    {
        $ordersProvider = $this->get('AppBundle\Provider\OrdersProvider');
        $order = $ordersProvider->getSingle($id);
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($order, 'json');
        $view = $this->view($order, 200);
        return $this->handleView($view);
    }
}