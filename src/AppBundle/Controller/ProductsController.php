<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Products;
use AppBundle\Form\AddProductType;
use AppBundle\Form\EditProductType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ProductsController extends FOSRestController
{
    /**
     * This method return all products
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
     * This method return only one product
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

    /**
     * This method added new product
     *
     * @Rest\Put("/api/panel/admin/add/product")
     *
     * @param Request $request request object
     *
     * @return Response
     */
    public function addProduct(Request $request): Response
    {
        $form = $this->createForm(AddProductType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $str = "data:image/png;base64,";
            $data = str_replace($str, "", $request->get('miniature'));
            $data = base64_decode($data);
            $name = md5(uniqid(rand(), true)) . '.png';
            file_put_contents('uploads/' . $name, $data);
            $productManager = $this->get('AppBundle\Manager\ProductManager');
            $productManager->add($request->request->all(), $name);
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method edit product
     *
     * @Rest\Put("/api/panel/admin/{id}/edit/product")
     *
     * @param Request $request request object
     * @param int $id product id
     *
     * @return Response
     */
    public function editProduct(Request $request, int $id): Response
    {
        $form = $this->createForm(EditProductType::class);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $productManager = $this->get('AppBundle\Manager\ProductManager');
            $productProvider = $this->get('AppBundle\Provider\ProductsProvider');
            $productManager->edit($productProvider->getSingle($id), $request->request->all());
            $view = $this->view('succes', 200);
            return $this->handleView($view);
        }
        $view = $this->view($form->getErrors(), 500);
        return $this->handleView($view);
    }

    /**
     * This method deleted product
     *
     * @Rest\Delete("/api/panel/admin/{id}/del/product")
     *
     * @param int $id product id
     *
     * @return Response
     */
    public function delProduct(int $id): Response
    {
        $productProvider = $this->get('AppBundle\Manager\ProductManager');
        $productProvider->del($id);
        $view = $this->view('success', 200);
        return $this->handleView($view);
    }
}