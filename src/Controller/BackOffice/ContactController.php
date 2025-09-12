<?php

namespace App\Controller\BackOffice;

use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/contact')]
final class ContactController extends AbstractController
{

    #[Route('/index', name: 'app_contact_index', methods: ['GET'])]
    public function index(ContactRepository $contactRepository):Response
    {
        return $this->render('BackOffice/Contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

}