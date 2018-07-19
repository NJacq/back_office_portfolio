<?php

namespace App\Controller;

use App\Entity\ProjetsImages;
use App\Form\ProjetsImagesType;
use App\Repository\ProjetsImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/projets_images")
 */
class ProjetsImagesController extends Controller
{
    /**
     * @Route("/", name="projets_images_index", methods="GET")
     */
    public function index(ProjetsImagesRepository $projetsImagesRepository): Response
    {
        return $this->render('projets_images/index.html.twig', ['projets_images' => $projetsImagesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projets_images_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $projetsImage = new ProjetsImages();
        $form = $this->createForm(ProjetsImagesType::class, $projetsImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projetsImage);
            $em->flush();

            return $this->redirectToRoute('projets_images_index');
        }

        return $this->render('projets_images/new.html.twig', [
            'projets_image' => $projetsImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projets_images_show", methods="GET")
     */
    public function show(ProjetsImages $projetsImage): Response
    {
        return $this->render('projets_images/show.html.twig', ['projets_image' => $projetsImage]);
    }

    /**
     * @Route("/{id}/edit", name="projets_images_edit", methods="GET|POST")
     */
    public function edit(Request $request, ProjetsImages $projetsImage): Response
    {
        $form = $this->createForm(ProjetsImagesType::class, $projetsImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projets_images_edit', ['id' => $projetsImage->getId()]);
        }

        return $this->render('projets_images/edit.html.twig', [
            'projets_image' => $projetsImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projets_images_delete", methods="DELETE")
     */
    public function delete(Request $request, ProjetsImages $projetsImage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projetsImage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projetsImage);
            $em->flush();
        }

        return $this->redirectToRoute('projets_images_index');
    }
}
