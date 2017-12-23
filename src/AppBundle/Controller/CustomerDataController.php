<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 22.11.2017
 * Time: 19:29
 */

namespace AppBundle\Controller;


use AppBundle\Form\AddCustomerData;
use AppBundle\Form\EditCustomerData;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerDataController extends FOSRestController
{
    /**
     * This class return all customer data
     *
     * @Rest\Get("/api/get/all/customerData")
     *
     * @return Response
     */
    public function getAllCustomerData(): Response
    {
        $customerDataProvider = $this->get('AppBundle\Provider\CustomerDataProvider');
        $customerData = $customerDataProvider->getAll();
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($customerData, 'json');
        $view = $this->view($customerData, 200);
        return $this->handleView($view);
    }

    /**
     * This class return only one customer data
     *
     * @Rest\Get("/api/panel/get/user/{id}/customerData")
     *
     * @return Response
     */
    public function getSingleCustomerData(int $id): Response
    {
        $customerDataProvider = $this->get('AppBundle\Provider\CustomerDataProvider');
        $customerData = $customerDataProvider->getSingle($id);
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($customerData, 'json');
        $view = $this->view($customerData, 200);
        return $this->handleView($view);
    }

    /**
     * This class return only one customer data
     *
     * @Rest\Get("/api/panel/user/get/{id}/customerData")
     *
     * @return Response
     */
    public function getAllUserCustomerData(int $id): Response
    {
        $customerDataProvider = $this->get('AppBundle\Provider\CustomerDataProvider');
        $customerData = $customerDataProvider->getAllUsers($id);
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($customerData, 'json');
        $view = $this->view($customerData, 200);
        return $this->handleView($view);
    }

    /**
     * This method add customerData
     *
     * @Rest\Put("/api/panel/user/add/customerData")
     *
     * @param  Request $request request object
     *
     * @return Response
     */
    public function addCustomerData(Request $request): Response
    {
        $form = $this->createForm(AddCustomerData::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $brandsManager = $this->get('AppBundle\Manager\CustomerDataManager');
            $brandsManager->add($request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method edit customerData
     *
     * @Rest\Put("/api/panel/user/{id}/edit/customerData")
     *
     * @param Request $request request object
     * @param int $id id
     *
     * @return Response
     */
    public function editCustomerData(Request $request, int $id): Response
    {
        $form = $this->createForm(EditCustomerData::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $brandsManager = $this->get('AppBundle\Manager\CustomerDataManager');
            $brandsProvider = $this->get('AppBundle\Provider\CustomerDataProvider');
            $brandsManager->edit($brandsProvider->getSingle($id), $request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method del customerData
     *
     * @Rest\Delete("/api/panel/user/{id}/del/customerData")
     *
     * @param int $id id
     *
     * @return Response
     */
    public function delCustomerData(int $id): Response
    {
        $customerDataProvider = $this->get('AppBundle\Manager\CustomerDataManager');
        $customerDataProvider->del($id);
        $view = $this->view('success', 200);
        return $this->handleView($view);
    }

}