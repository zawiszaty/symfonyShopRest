<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 22.11.2017
 * Time: 19:29
 */

namespace AppBundle\Controller;


use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
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
     * @Rest\Get("/api/get/{id}/customerData")
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

}