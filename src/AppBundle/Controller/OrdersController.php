<?php


namespace AppBundle\Controller;

use AppBundle\Form\AddOrderType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
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
     * This method return only one order
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

    /**
     * This method add new order
     *
     * @Rest\Put("/api/panel/user/add/order")
     *
     * @param Request $request request object
     *
     * @return Response
     */
    public function addOrder(Request $request): Response
    {
        $form = $this->createForm(AddOrderType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $ordersManager = $this->get('AppBundle\Manager\OrdersManager');
            $ordersManager->add($request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method edit order
     *
     * @Rest\Put("/api/panel/user/{id}/edit/order")
     *
     * @param Request $request request object
     * @param int $id orders id
     *
     * @return Response
     */
    public function editOrder(Request $request, int $id): Response
    {
        $form = $this->createForm(AddOrderType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $ordersManager = $this->get('AppBundle\Manager\OrdersManager');
            $ordersProvider = $this->get('AppBundle\Provider\OrdersProvider');
            $ordersManager->edit($ordersProvider->getSingle($id), $request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method del order
     *
     * @Rest\Put("/api/panel/user/{id}/del/order")
     *
     * @param Request $request request object
     * @param int $id orders id
     *
     * @return Response
     */
    public function delOrder(Request $request, int $id): Response
    {
        $OrdersProvider = $this->get('AppBundle\Manager\OrdersManager');
        $OrdersProvider->del($id);
        $view = $this->view('success', 200);
        return $this->handleView($view);
    }

}