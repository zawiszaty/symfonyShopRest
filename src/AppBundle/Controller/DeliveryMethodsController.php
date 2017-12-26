<?php

namespace AppBundle\Controller;


use AppBundle\Form\AddDeliveryMethodsType;
use AppBundle\Form\EditDeliveryMethod;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveryMethodsController extends FOSRestController
{
    /**
     * This class return all delivery methods
     *
     * @Rest\Get("/api/get/all/deliveryMethod")
     *
     * @return Response
     */
    public function getAllDeliveryMethods(): Response
    {
        $deliveryMethodsProvider = $this->get('AppBundle\Provider\DeliveryMethodsProvider');
        $customerData = $deliveryMethodsProvider->getAll();
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($customerData, 'json');
        $view = $this->view($customerData, 200);
        return $this->handleView($view);
    }

    /**
     * This method add customerData
     *
     * @Rest\Put("/api/panel/admin/add/deliveryMethod")
     *
     * @param  Request $request request object
     *
     * @return Response
     */
    public function addCustomerData(Request $request): Response
    {
        $form = $this->createForm(AddDeliveryMethodsType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $deliveryMethodsManager = $this->get('AppBundle\Manager\DeliveryMethodManager');
            $deliveryMethodsManager->add($request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method return only one delivery method
     *
     * @Rest\Get("/api/get/{id}/deliveryMethod")
     *
     * @return Response
     */
    public function getSingleDeliveryMethod(int $id): Response
    {
        $deliveryMethodsProvider = $this->get('AppBundle\Provider\DeliveryMethodsProvider');
        $order = $deliveryMethodsProvider->getSingle($id);
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($order, 'json');
        $view = $this->view($order, 200);
        return $this->handleView($view);
    }

    /**
     * This method edit delivery method
     *
     * @Rest\Put("/api/panel/admin/{id}/edit/deliveryMethod")
     *
     * @param Request $request request object
     * @param int $id orders id
     *
     * @return Response
     */
    public function editOrder(Request $request, int $id): Response
    {
        $form = $this->createForm(EditDeliveryMethod::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $deliveryMethodsManager = $this->get('AppBundle\Manager\DeliveryMethodManager');
            $deliveryMethodsProvider = $this->get('AppBundle\Provider\DeliveryMethodsProvider');
            $deliveryMethodsManager->edit($deliveryMethodsProvider->getSingle($id), $request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method del del delivery method
     *
     * @Rest\Delete("/api/panel/user/{id}/del/deliveryMethod")
     *
     * @param int $id id
     *
     * @return Response
     */
    public function delDeliveryMethods(int $id): Response
    {
        $deliveryMethodsProvider = $this->get('AppBundle\Manager\DeliveryMethodManager');
        $deliveryMethodsProvider->del($id);
        $view = $this->view('success', 200);
        return $this->handleView($view);
    }
}