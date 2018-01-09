<?php


namespace AppBundle\Controller;


use AppBundle\Form\AddProductType;
use AppBundle\Form\EditProductType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductsController
 *
 * @package AppBundle\Controller
 */
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
        $productsProvider = $this->get('appbundle\provider\productsprovider');
        $products = $productsProvider->getAll();

        $serializer = $this->get('jms_serializer');
        $serializer->serialize($products, 'json');

        $view = $this->view($products, 200);
        return $this->handleView($view);
    }

    /**
     * This method return all products and sort him by prize
     *
     * @Rest\Get("/api/get/all/products/{sort}")
     *
     * @return Response
     */
    public function getAllProductsSortByPrize(string $sort): Response
    {
        $productsProvider = $this->get('appbundle\provider\productsprovider');
        $products = $productsProvider->getAllSortByPrize($sort);

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
     * @param int $id product id
     *
     * @return Response
     */
    public function getSingleProduct(int $id): Response
    {
        $productsProvider = $this->get('appbundle\provider\productsprovider');
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

            $productManager = $this->get('appbundle\manager\productmanager');
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
            $str = "data:image/png;base64,";

            $data = str_replace($str, "", $request->get('miniature'));
            $data = base64_decode($data);

            $name = md5(uniqid(rand(), true)) . '.png';

            file_put_contents('uploads/' . $name, $data);

            $productManager = $this->get('appbundle\manager\productmanager');
            $productProvider = $this->get('appbundle\provider\productsprovider');
            $productManager->edit($productProvider->getSingle($id), $request->request->all(), $name);

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
        $productProvider = $this->get('appbundle\manager\productmanager');
        $productProvider->del($id);

        $view = $this->view('success', 200);
        return $this->handleView($view);
    }

    /**
     * This method return all products of the brand
     *
     * @Rest\Get("/api/all/brands/products/{brand}")
     *
     * @param int $brand brands id
     *
     * @return Response
     */
    public function getAllBrandsProduct(int $brand): Response
    {
        $productProvider = $this->get('appbundle\provider\productsprovider');
        $products = $productProvider->getAllBrandsProducts($brand);

        $view = $this->view($products, 200);
        return $this->handleView($view);
    }

    /**
     * This method return all products of the brand and sort him by prize
     *
     * @Rest\Get("/api/all/brands/products/{brand}/{sort}")
     *
     * @param int $brand brands id
     * @param string $sort
     *
     * @return Response
     */
    public function getAllBrandsProduct_SortByPrize(int $brand, string $sort): Response
    {
        $productProvider = $this->get('appbundle\provider\productsprovider');
        $products = $productProvider->getAllBrandsProduct_SortByPrize($brand, $sort);

        $view = $this->view($products, 200);
        return $this->handleView($view);
    }

    /**
     * This method return all products of category
     *
     * @Rest\Get("/api/all/categories/products/{categories}")
     *
     * @param int $categories categories id
     *
     * @return Response
     */
    public function getAllCategoryProducts(int $categories): Response
    {
        $productProvider = $this->get('appbundle\provider\productsprovider');
        $products = $productProvider->getAllCategoryProducts($categories);

        $view = $this->view($products, 200);
        return $this->handleView($view);
    }

    /**
     * This method return all products of category
     *
     * @Rest\Get("/api/all/categories/products/{categories}/{sort}")
     *
     * @param int $categories categories id
     * @param string $sort sort method
     *
     * @return Response
     */
    public function getAllCategoryProducts_SortByPrize(int $categories, string $sort): Response
    {
        $productProvider = $this->get('appbundle\provider\productsprovider');
        $products = $productProvider->getAllCategoryProducts_SortByPrize($categories, $sort);

        $view = $this->view($products, 200);
        return $this->handleView($view);
    }

    /**
     * This method return all products of order
     *
     * @Rest\Get("/api/all/orders/products/{products}")
     *
     * @param string $products string with id of products
     *
     * @return Response
     */
    public function getAllOrdersProduct(string $products): Response
    {
        $productProvider = $this->get('appbundle\provider\productsprovider');
        $products = $productProvider->getAllOrders($products);

        $view = $this->view($products, 200);
        return $this->handleView($view);
    }
}