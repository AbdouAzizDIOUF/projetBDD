<?php

namespace App\Controller;

use App\Entity\Fournir;
use App\Form\FournirType;
use App\Repository\FournirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fournir")
 */
class FournirController extends AbstractController
{
    /**
     * @Route("/", name="fournir_index", methods={"GET"})
     */
    /*cette fonction retourne la liste de toutes les livraisons*/
    public function index(FournirRepository $fournirRepository): Response
    {
        return $this->render('fournir/index.html.twig', [
            'fournirs' => $fournirRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fournir_new", methods={"GET","POST"})
     */
    /*cette fonction permet d'ajouter une nouvelle livraison*/
    public function new(Request $request): Response
    {
        $fournir = new Fournir();
        $form = $this->createForm(FournirType::class, $fournir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fournir);
            $entityManager->flush();
            $this->addFlash("success","Nouvelle livraison ajoutée avec succés");

            return $this->redirectToRoute('fournir_index');
        }

        return $this->render('fournir/new.html.twig', [
            'fournir' => $fournir,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fournir_show", methods={"GET"})
     */
    /*cette fonction permet d'afficher explicitement une livraisons*/
    public function show(Fournir $fournir): Response
    {
        return $this->render('fournir/show.html.twig', [
            'fournir' => $fournir,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fournir_edit", methods={"GET","POST"})
     */
    /*cette fonction permet de modifier une livraison*/
    public function edit(Request $request, Fournir $fournir): Response
    {
        $form = $this->createForm(FournirType::class, $fournir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success","modification effectuée avec succés");

            return $this->redirectToRoute('fournir_index');
        }

        return $this->render('fournir/edit.html.twig', [
            'fournir' => $fournir,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fournir_delete", methods={"DELETE"})
     */
    /*cette fonction permet de supprimer une livraison*/
    public function delete(Request $request, Fournir $fournir): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fournir->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fournir);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fournir_index');
    }
}
