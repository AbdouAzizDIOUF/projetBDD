<?php

namespace App\Controller;

use App\Entity\Parapharmacie;
use App\Form\ParapharmacieType;
use App\Repository\ParapharmacieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parapharmacie")
 */
class ParapharmacieController extends AbstractController
{
    /**
     * @Route("/", name="parapharmacie_index", methods={"GET"})
     */
    public function index(ParapharmacieRepository $parapharmacieRepository): Response
    {
        return $this->render('parapharmacie/index.html.twig', [
            'parapharmacies' => $parapharmacieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parapharmacie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parapharmacie = new Parapharmacie();
        $form = $this->createForm(ParapharmacieType::class, $parapharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parapharmacie);
            $entityManager->flush();

            return $this->redirectToRoute('parapharmacie_index');
        }

        return $this->render('parapharmacie/new.html.twig', [
            'parapharmacie' => $parapharmacie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parapharmacie_show", methods={"GET"})
     */
    public function show(Parapharmacie $parapharmacie): Response
    {
        return $this->render('parapharmacie/show.html.twig', [
            'parapharmacie' => $parapharmacie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parapharmacie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Parapharmacie $parapharmacie): Response
    {
        $form = $this->createForm(ParapharmacieType::class, $parapharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parapharmacie_index');
        }

        return $this->render('parapharmacie/edit.html.twig', [
            'parapharmacie' => $parapharmacie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parapharmacie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Parapharmacie $parapharmacie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parapharmacie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parapharmacie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parapharmacie_index');
    }
}
