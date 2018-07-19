<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Form\CompetencesType;
use App\Repository\CompetencesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/competences")
 */
class CompetencesController extends Controller
{
    /**
     * @Route("/", name="competences_index", methods="GET")
     */
    public function index(CompetencesRepository $competencesRepository): Response
    {
        return $this->render('competences/index.html.twig', ['competences' => $competencesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="competences_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $competence = new Competences();
        $form = $this->createForm(CompetencesType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competence);
            $em->flush();

            return $this->redirectToRoute('competences_index');
        }

        return $this->render('competences/new.html.twig', [
            'competence' => $competence,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="competences_show", methods="GET")
     */
    public function show(Competences $competence): Response
    {
        return $this->render('competences/show.html.twig', ['competence' => $competence]);
    }

    /**
     * @Route("/{id}/edit", name="competences_edit", methods="GET|POST")
     */
    public function edit(Request $request, Competences $competence): Response
    {
        $form = $this->createForm(CompetencesType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competences_edit', ['id' => $competence->getId()]);
        }

        return $this->render('competences/edit.html.twig', [
            'competence' => $competence,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="competences_delete", methods="DELETE")
     */
    public function delete(Request $request, Competences $competence): Response
    {
        if ($this->isCsrfTokenValid('delete'.$competence->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competence);
            $em->flush();
        }

        return $this->redirectToRoute('competences_index');
    }
}
