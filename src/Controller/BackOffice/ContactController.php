<?php

namespace App\Controller\BackOffice;

use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/contacts')]
final class ContactController extends AbstractController
{
    #[Route('/', name: 'backoffice_contact_index', methods: ['GET'])]
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('BackOffice/Contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'backoffice_contact_show', methods: ['GET'])]
    public function show(int $id, ContactRepository $contactRepository): Response
    {
        $contact = $contactRepository->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Message introuvable.');
        }

        return $this->render('BackOffice/Contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/{id}', name: 'backoffice_contact_delete', methods: ['POST'])]
    public function delete(int $id, ContactRepository $contactRepository, EntityManagerInterface $em): Response
    {
        $contact = $contactRepository->find($id);

        if ($contact) {
            $em->remove($contact);
            $em->flush();
            $this->addFlash('success', 'Message supprimé ✅');
        }

        return $this->redirectToRoute('backoffice_contact_index');
    }
}
