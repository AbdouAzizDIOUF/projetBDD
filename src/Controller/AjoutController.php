<?php

namespace App\Controller;

use App\Entity\AccessoirMed;
use App\Entity\CategoryMed;
use App\Entity\Medicament;
use App\Entity\Parapharmacie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutController extends AbstractController
{

    private $produitsRepository;
    private $categoryMedRepository;


    /**
     * @Route("/home", name="home")
     */
    public function index2(): Response
    {
        return $this->render('index.html.twig'
        );
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function index(): Response
    {
        return $this->render('ajout/index.html.twig', [
            'controller_name' => 'AjoutController',
        ]);
    }
}
