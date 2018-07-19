<?php

namespace App\Controller;

use App\Entity\ProjetsCompetences;
use App\Form\ProjetsCompetencesType;
use App\Repository\ProjetsCompetencesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/projets_competences")
 */
class ProjetsCompetencesController extends Controller
{
    /**
     * @Route("/", name="projets_competences_index", methods="GET")
     */
    public function index(ProjetsCompetencesRepository $projetsCompetencesRepository): Response
    {
        return $this->render('projets_competences/index.html.twig', ['projets_competences' => $projetsCompetencesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projets_competences_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $projetsCompetence = new ProjetsCompetences();
        $form = $this->createForm(ProjetsCompetencesType::class, $projetsCompetence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projetsCompetence);
            $em->flush();

            return $this->redirectToRoute('projets_competences_index');
        }

        return $this->render('projets_competences/new.html.twig', [
            'projets_competence' => $projetsCompetence,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projets_competences_show", methods="GET")
     */
    public function show(ProjetsCompetences $projetsCompetence): Response
    {
        return $this->render('projets_competences/show.html.twig', ['projets_competence' => $projetsCompetence]);
    }

    /**
     * @Route("/{id}/edit", name="projets_competences_edit", methods="GET|POST")
     */
    public function edit(Request $request, ProjetsCompetences $projetsCompetence): Response
    {
        $form = $this->createForm(ProjetsCompetencesType::class, $projetsCompetence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projets_competences_edit', ['id' => $projetsCompetence->getId()]);
        }

        return $this->render('projets_competences/edit.html.twig', [
            'projets_competence' => $projetsCompetence,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projets_competences_delete", methods="DELETE")
     */
    public function delete(Request $request, ProjetsCompetences $projetsCompetence): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projetsCompetence->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projetsCompetence);
            $em->flush();
        }

        return $this->redirectToRoute('projets_competences_index');
    }
}
