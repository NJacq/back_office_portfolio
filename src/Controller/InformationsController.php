<?php

namespace App\Controller;

use App\Entity\Informations;
use App\Form\InformationsType;
use App\Repository\InformationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/informations")
 */
class InformationsController extends Controller
{
    /**
     * @Route("/", name="informations_index", methods="GET")
     */
    public function index(InformationsRepository $informationsRepository): Response
    {
        return $this->render('informations/index.html.twig', ['informations' => $informationsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="informations_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $information = new Informations();
        $form = $this->createForm(InformationsType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($information);
            $em->flush();

            return $this->redirectToRoute('informations_index');
        }

        return $this->render('informations/new.html.twig', [
            'information' => $information,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="informations_show", methods="GET")
     */
    public function show(Informations $information): Response
    {
        return $this->render('informations/show.html.twig', ['information' => $information]);
    }

    /**
     * @Route("/{id}/edit", name="informations_edit", methods="GET|POST")
     */
    public function edit(Request $request, Informations $information): Response
    {
        $form = $this->createForm(InformationsType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('informations_edit', ['id' => $information->getId()]);
        }

        return $this->render('informations/edit.html.twig', [
            'information' => $information,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="informations_delete", methods="DELETE")
     */
    public function delete(Request $request, Informations $information): Response
    {
        if ($this->isCsrfTokenValid('delete'.$information->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($information);
            $em->flush();
        }

        return $this->redirectToRoute('informations_index');
    }
}
