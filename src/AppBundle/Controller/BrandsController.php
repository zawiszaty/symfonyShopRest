<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 21.11.2017
 * Time: 18:52
 */

namespace AppBundle\Controller;


use AppBundle\Form\AddBrandType;
use AppBundle\Form\EditBrandType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * This method added new brand
     *
     * @Rest\Put("/api/add/brand")
     *
     * @return Response
     */
    public function addBrands(Request $request): Response
    {
        $form = $this->createForm(AddBrandType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $brandsManager = $this->get('AppBundle\Manager\BrandsManager');
            $brandsManager->add($request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }

        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method edit brand
     *
     * @Rest\Put("/api/{id}/edit/brand")
     *
     * @param Request $request request object
     * @param int $id brand id
     *
     * @return Response
     */
    public function editBrands(Request $request, int $id): Response
    {
        $form = $this->createForm(EditBrandType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $brandsManager = $this->get('AppBundle\Manager\BrandsManager');
            $brandsProvider = $this->get('AppBundle\Provider\BrandsProvider');
            $brandsManager->edit($brandsProvider->getSingle($id), $request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }

        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     *
     * This method deleted  brand
     *
     * @Rest\Put("/api/{id}/del/brand")
     *
     * @param Request $request request object
     * @param int $id brand id
     *
     * @return Response
     */
    public function deleteBrand(Request $request, int $id): Response
    {
        $brandsManager = $this->get('AppBundle\Manager\BrandsManager');
        $brandsManager->delete($id);
        $view = $this->view('success', 500);
        return $this->handleView($view);
    }

}