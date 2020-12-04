<?php

namespace App\Controller;

use App\Entity\Utlisaateur;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class AdminController extends AbstractController
{

    /**
     * @Route("/admin/{id}/edit", name="admin")
     */
        /*cette fonction permet à l'administrateur de pouvoir modifier son mot de passe*/
    public function formulaireEdit($id, Request $request,UserPasswordEncoderInterface $encoder){
        $manager = $this->getDoctrine()->getManager();
        $repo=$this->getDoctrine()->getRepository(Utlisaateur::class);
        $admin2=$repo->find($id);
        $admin=new Utlisaateur();
        $form=$this->createFormBuilder($admin)
            ->add('password',PasswordType::class)
            ->add('password2',PasswordType::class)
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $admin2->setPassword($encoder->encodePassword($admin2,$admin->getPassword()));
            $admin2->setPassword2($encoder->encodePassword($admin2,$admin->getPassword()));
            $manager->persist($admin2);
            $manager->flush();
            $this->addFlash("success","Mot de passe modifié avec succés");
            return $this->redirectToRoute('medicament_index');
        }
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'FormulaireController','form'=>$form->createView()
        ]);
    }
}
