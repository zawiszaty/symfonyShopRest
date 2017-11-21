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

class TestController extends FOSRestController
{
    /**
     * GET Route annotation.
     *
     * @Get("/api/type")
     */
    public function testAction()
    {
        $view = $this->view('success', 200);
        return $this->handleView($view);
    }

}