<?php

namespace App\Controller\FrontOffice;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContactPublicController extends AbstractController
{
    #[Route('/contact', name: 'app_contact_public')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();

        
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', 'Votre message a bien été envoyé !');
            return $this->redirectToRoute('app_contact_public');
        }

        return $this->render('FrontOffice/contact_public/index.html.twig', [
            'form' => $form->createView(), 
        ]);
    }
}
