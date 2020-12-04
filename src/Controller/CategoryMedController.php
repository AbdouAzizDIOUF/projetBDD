<?php

namespace App\Controller;

use App\Entity\CategoryMed;
use App\Form\CategoryMedType;
use App\Repository\CategoryMedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/med")
 */
class CategoryMedController extends AbstractController
{
    /**
     * @Route("/", name="category_med_index", methods={"GET"})
     */
    /*/*cette fonction retourne la liste de toutes les categories de  medicaments*/
    public function index(CategoryMedRepository $categoryMedRepository): Response
    {
        return $this->render('category_med/index.html.twig', [
            'category_meds' => $categoryMedRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_med_new", methods={"GET","POST"})
     */
    /*cette fonction permet d'ajouter une nouvelle categorie de medicament*/
    public function new(Request $request): Response
    {
        $categoryMed = new CategoryMed();
        $form = $this->createForm(CategoryMedType::class, $categoryMed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryMed);
            $entityManager->flush();
            $this->addFlash("success","nouvelle categorie medicale ajoutée avec succés");

            return $this->redirectToRoute('category_med_index');
        }

        return $this->render('category_med/new.html.twig', [
            'category_med' => $categoryMed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_med_show", methods={"GET"})
     */
    /*cette fonction permet d'afficher explicitement une nouvelle categorie de medicament*/
    public function show(CategoryMed $categoryMed): Response
    {
        return $this->render('category_med/show.html.twig', [
            'category_med' => $categoryMed,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_med_edit", methods={"GET","POST"})
     */
    /*cette fonction permet de modifier une nouvelle categorie de medicament*/
    public function edit(Request $request, CategoryMed $categoryMed): Response
    {
        $form = $this->createForm(CategoryMedType::class, $categoryMed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success","modification effectuée avec succés");

            return $this->redirectToRoute('category_med_index');
        }

        return $this->render('category_med/edit.html.twig', [
            'category_med' => $categoryMed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_med_delete", methods={"DELETE"})
     */
    /*cette fonction permet de supprimer une categorie de medicament*/
    public function delete(Request $request, CategoryMed $categoryMed): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryMed->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryMed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_med_index');
    }
}
