<?php

namespace App\Controller;

use App\Entity\AccessoirMed;
use App\Form\AccessoirMedType;
use App\Repository\AccessoirMedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accessoir/med")
 */
class AccessoirMedController extends AbstractController
{
    /**
     * @Route("/", name="accessoir_med_index", methods={"GET"})
     */
    public function index(AccessoirMedRepository $accessoirMedRepository): Response
    {
        return $this->render('accessoir_med/index.html.twig', [
            'accessoir_meds' => $accessoirMedRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="accessoir_med_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $accessoirMed = new AccessoirMed();
        $form = $this->createForm(AccessoirMedType::class, $accessoirMed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($accessoirMed);
            $entityManager->flush();
            $this->addFlash("success","Nouveau accessoire medicale ajouté avec succés");

            return $this->redirectToRoute('accessoir_med_index');
        }

        return $this->render('accessoir_med/new.html.twig', [
            'accessoir_med' => $accessoirMed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accessoir_med_show", methods={"GET"})
     */
    public function show(AccessoirMed $accessoirMed): Response
    {
        return $this->render('accessoir_med/show.html.twig', [
            'accessoir_med' => $accessoirMed,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="accessoir_med_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AccessoirMed $accessoirMed): Response
    {
        $form = $this->createForm(AccessoirMedType::class, $accessoirMed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success","modification effectuée avec succés");

            return $this->redirectToRoute('accessoir_med_index');

        }

        return $this->render('accessoir_med/edit.html.twig', [
            'accessoir_med' => $accessoirMed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accessoir_med_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AccessoirMed $accessoirMed): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accessoirMed->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($accessoirMed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('accessoir_med_index');
    }
}
