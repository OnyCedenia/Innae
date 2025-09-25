<?php

namespace App\Controller\FrontOffice;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {   //recuperer les postes
        // $posts = $postRepository ->findAll();
        //transmettre les postes a la vue
        return $this->render('FrontOffice/home.html.twig', [
            // 'posts' => $posts,
        ]);
    }

}
