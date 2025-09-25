<?php

namespace App\Controller\BackOffice;

use App\Entity\Note;
use App\Form\NoteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'backoffice_dashboard')]
    public function dashboard(Request $request, EntityManagerInterface $em): Response
    {
        $note = $em->getRepository(Note::class)->findOneBy([]) ?? new Note();

        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($note);
            $em->flush();

            $this->addFlash('success', 'Ton pense-bête a été mis à jour ✅');
            return $this->redirectToRoute('backoffice_dashboard');
        }

        return $this->render('BackOffice/admin/dashboard.html.twig', [
            'noteForm' => $form->createView(),
        ]);
    }
}
