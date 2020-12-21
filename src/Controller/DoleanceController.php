<?php

namespace App\Controller;

use App\Entity\Doleance;
use App\Form\DoleanceType;
use App\Repository\DoleanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/doleance")
 */
class DoleanceController extends AbstractController
{
    /**
     * @Route("/", name="doleance_index", methods={"GET"})
     */
    public function index(DoleanceRepository $doleanceRepository): Response
    {
        return $this->render('doleance/index.html.twig', [
            'doleances' => $doleanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="doleance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $doleance = new Doleance();
        $form = $this->createForm(DoleanceType::class, $doleance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($doleance);
            $entityManager->flush();

            return $this->redirectToRoute('doleance_index');
        }

        return $this->render('doleance/new.html.twig', [
            'doleance' => $doleance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/goSearch", name="client_gosearch")
     */
    public function goSearch()
    {
        return $this->render('client/search.html.twig');
    }

    /**
     * @Route("/{id}", name="doleance_show", methods={"GET"})
     */
    public function show(Doleance $doleance): Response
    {
        return $this->render('doleance/show.html.twig', [
            'doleance' => $doleance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="doleance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Doleance $doleance): Response
    {
        $form = $this->createForm(DoleanceType::class, $doleance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('doleance_index');
        }

        return $this->render('doleance/edit.html.twig', [
            'doleance' => $doleance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="doleance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Doleance $doleance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$doleance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($doleance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('doleance_index');
    }
}
