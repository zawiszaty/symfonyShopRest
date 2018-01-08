<?php


namespace AppBundle\Controller;


use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserAuthController
 *
 * @package AppBundle\Controller
 */
class UserAuthController extends FOSRestController
{
    /**
     * Auth method
     *
     * @Rest\Post("/api/panel/auth")
     *
     * @return Response
     */
    public function auth(): Response
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $userData = [
                "role" => "ROLE_ADMIN",
                "userId" => $user->getId()
            ];

            $view = $this->view($userData, 200);

        } else if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {

            $userData = [
                "role" => "ROLE_USER",
                "userId" => $user->getId()
            ];

            $view = $this->view($userData, 200);
        }

        return $this->handleView($view);
    }
}