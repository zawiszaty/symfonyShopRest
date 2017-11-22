<?php


namespace AppBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ProductsController extends FOSRestController
{
    /**
     * This class return all products
     *
     * @Rest\Get("/api/get/all/products")
     *
     * @return Response
     */
    public function getAllProducts(): Response
    {
        $productsProvider = $this->get('AppBundle\Provider\ProductsProvider');
        $products = $productsProvider->getAll();
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($products, 'json');
        $view = $this->view($products, 200);
        return $this->handleView($view);
    }

    /**
     * This class return only one product
     *
     * @Rest\Get("/api/get/{id}/product")
     *
     * @return Response
     */
    public function getSingleProduct(int $id): Response
    {
        $productsProvider = $this->get('AppBundle\Provider\ProductsProvider');
        $products = $productsProvider->getSingle($id);
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($products, 'json');
        $view = $this->view($products, 200);
        return $this->handleView($view);
    }
}