<?php

namespace App\Controller;

use App\Entity\AccessoirMed;
use App\Entity\CategoryMed;
use App\Entity\Medicament;
use App\Entity\Parapharmacie;
use App\Entity\Utlisaateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AjoutController extends AbstractController
{

    private $produitsRepository;
    private $categoryMedRepository;


    /**
     * @Route("/ajout2", name="home")
     */
    /*ici j'ai utilisé cette fonction pour definir les identifiants de l'admin et en encodants son mot de passe*/
    public function index2(UserPasswordEncoderInterface $encoder): Response
    {
        $utilisateur= new Utlisaateur();
        $utilisateur->setUsername('admin@admin.com');
        $utilisateur->setPassword($encoder->encodePassword($utilisateur,"admin"));
        $utilisateur->setPassword2($encoder->encodePassword($utilisateur,"admin"));
        $utilisateur->setRoles("admin");
        $manager=$this->getDoctrine()->getManager();
        $manager->persist($utilisateur);
        $manager->flush();
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
