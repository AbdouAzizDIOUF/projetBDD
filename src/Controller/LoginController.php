<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{

    /**
     * @Route("/", name="login")
     */
    /*cette fonction nous redirige vers le formulaire de connexxion*/
    public function index(): Response
    {
        $this->addFlash("success","Authentification reussi");
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
    /**
     * @Route("/deconnexion",name="logout")
     */
    public  function logout(){}
}
