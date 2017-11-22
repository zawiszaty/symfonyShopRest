<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 21.11.2017
 * Time: 18:52
 */

namespace AppBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;

class BrandsController extends FOSRestController
{
    /**
     * This class return all brands
     *
     * @Get("/api/get/all/brands")
     *
     * @return Response
     */
    public function getAllBrands(): Response
    {
        $brandsProvider = $this->get('AppBundle\Provider\BrandsProvider');
        $brands = $brandsProvider->getAll();
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($brands, 'json');
        $view = $this->view($brands, 200);
        return $this->handleView($view);
    }

    /**
     * GET Route annotation.
     *
     * @param int $id
     *
     * @Get("/api/get/{id}/brands")
     *
     * @return Response
     */
    public function getSingleBrands(int $id): Response
    {
        $brandsProvider = $this->get('AppBundle\Provider\BrandsProvider');
        $brand = $brandsProvider->getSingle($id);
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($brand, 'json');
        $view = $this->view($brand, 200);
        return $this->handleView($view);
    }

}