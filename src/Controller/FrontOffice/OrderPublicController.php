<?php

namespace App\Controller\FrontOffice;

use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OrderPublicController extends AbstractController
{
    #[Route('/order', name: 'app_order_public')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $order = new Order();

        $form = $this->createForm(OrderType::class, $order);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($order);
            $em->flush();

            $this->addFlash('success', 'Votre commande a bien été enregistrée ! ✅');

            return $this->redirectToRoute('app_order_public');
        }

        return $this->render('FrontOffice/order_public/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
