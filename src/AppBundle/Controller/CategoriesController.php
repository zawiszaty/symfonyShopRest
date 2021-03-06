<?php

namespace AppBundle\Controller;


use AppBundle\Form\AddCategoryType;
use AppBundle\Form\EditCategoryType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoriesController
 *
 * @package AppBundle\Controller
 */
class CategoriesController extends FOSRestController
{
    /**
     * This method return all categories
     *
     * @Get("/api/get/all/categories")
     *
     * @return Response
     */
    public function getAllCategories(): Response
    {
        $categoriesProvider = $this->get('appbundle\provider\categoriesprovider');
        $categories = $categoriesProvider->getAll();

        $serializer = $this->get('jms_serializer');
        $serializer->serialize($categories, 'json');

        $view = $this->view($categories, 200);
        return $this->handleView($view);
    }

    /**
     * This method return only one category
     *
     * @Get("/api/get/{id}/categories")
     *
     * @param int $id id category
     *
     * @return Response
     */
    public function getSingleCategory(int $id): Response
    {
        $categoriesProvider = $this->get('appbundle\provider\categoriesprovider');
        $category = $categoriesProvider->getSingle($id);

        $serializer = $this->get('jms_serializer');
        $serializer->serialize($category, 'json');

        $view = $this->view($category, 200);
        return $this->handleView($view);
    }

    /**
     * This method added category
     *
     * @Rest\Put("/api/panel/admin/add/category")
     *
     * @param Request $request request object
     *
     * @return Response
     */
    public function addCategory(Request $request): Response
    {
        $form = $this->createForm(AddCategoryType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $brandsManager = $this->get('appbundle\manager\categoriesmanager');
            $brandsManager->add($request->request->all());
            
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }

        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method edit category
     *
     * @Rest\Put("/api/panel/admin/{id}/edit/category")
     *
     * @param Request $request request object
     * @param int $id brand id
     *
     * @return Response
     */
    public function editCategory(Request $request, int $id): Response
    {

        $form = $this->createForm(EditCategoryType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $brandsManager = $this->get('appbundle\manager\categoriesmanager');
            $brandsProvider = $this->get('appbundle\provider\categoriesprovider');
            $brandsManager->edit($brandsProvider->getSingle($id),$request->request->all());

            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }

        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method del category
     *
     * @Rest\Delete("/api/panel/admin/{id}/del/category")
     *
     * @param int $id category id
     *
     * @return Response
     */
    public function delCategory(int $id): Response
    {
        $categoriesManager = $this->get('appbundle\manager\categoriesmanager');
        $categoriesManager->del($id);
        $view = $this->view('success', 200);
        return $this->handleView($view);
    }
}