<?php

namespace App\Controller;

use App\Entity\Rayon;
use App\Form\RayonType;
use App\Repository\RayonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rayon")
 */
class RayonController extends AbstractController
{
    /**
     * @Route("/", name="rayon_index", methods={"GET"})
     */
    public function index(RayonRepository $rayonRepository): Response
    {
        return $this->render('rayon/index.html.twig', [
            'rayons' => $rayonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rayon_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rayon = new Rayon();
        $form = $this->createForm(RayonType::class, $rayon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rayon);
            $entityManager->flush();
            $this->addFlash("success"," nouveau rayon ajouté avec succés");

            return $this->redirectToRoute('rayon_index');
        }

        return $this->render('rayon/new.html.twig', [
            'rayon' => $rayon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rayon_show", methods={"GET"})
     */
    public function show(Rayon $rayon): Response
    {
        return $this->render('rayon/show.html.twig', [
            'rayon' => $rayon,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rayon_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rayon $rayon): Response
    {
        $form = $this->createForm(RayonType::class, $rayon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success","modification effectué avec succés");
            return $this->redirectToRoute('rayon_index');
        }

        return $this->render('rayon/edit.html.twig', [
            'rayon' => $rayon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rayon_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Rayon $rayon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rayon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rayon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rayon_index');
    }
}
