<?php


namespace AppBundle\Controller;


use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class UserAuthController extends FOSRestController
{
    /**
     * This method added new brand
     *
     * @Rest\Post("/api/panel/auth")
     *
     * @return Response
     */
    public function auth(): Response
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $view = $this->view('ROLE_ADMIN', 200);
        } else if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $view = $this->view('ROLE_USER', 200);
        }
        return $this->handleView($view);
    }
}