<?php
namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TrainingController extends AbstractController
{
    #[Route('/training', name: 'app_training_index')]
    public function index(): Response
    {
        return $this->render('FrontOffice/training/index.html.twig');
    }

    #[Route('/trainings/lessons', name: 'app_training_lessons')]
    public function lessons(): Response
    {
        return $this->render('FrontOffice/training/lessons.html.twig');
    }

    #[Route('/trainings/animations', name: 'app_training_animations')]
    public function animations(): Response
    {
        return $this->render('FrontOffice/training/animations.html.twig');
    }
}





