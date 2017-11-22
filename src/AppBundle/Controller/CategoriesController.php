<?php

namespace AppBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends FOSRestController
{
    /**
     * This class return all categories
     *
     * @Get("/api/get/all/categories")
     *
     * @return Response
     */
    public function getAllCategories(): Response
    {
        $categoriesProvider = $this->get('AppBundle\Provider\CategoriesProvider');
        $categories = $categoriesProvider->getAll();
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($categories, 'json');
        $view = $this->view($categories, 200);
        return $this->handleView($view);
    }

    /**
     * This class return only one category
     *
     * @Get("/api/get/{id}/categories")
     *
     * @return Response
     */
    public function getSingleCategory(int $id): Response
    {
        $categoriesProvider = $this->get('AppBundle\Provider\CategoriesProvider');
        $category = $categoriesProvider->getSingle($id);
        $serializer = $this->get('jms_serializer');
        $serializer->serialize($category, 'json');
        $view = $this->view($category, 200);
        return $this->handleView($view);
    }
}