<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'backoffice_dashboard')]
    public function dashboard(): Response
    {
        // Pense-bête par défaut, à remplacer par une récupération depuis la base si tu crées une entity
        $adminPenseBete = "Rien pour l'instant";

        return $this->render('BackOffice/admin/dashboard.html.twig', [
            'adminPenseBete' => $adminPenseBete,
        ]);
    }
}
