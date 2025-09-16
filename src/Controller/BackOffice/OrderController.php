<?php

namespace App\Controller\BackOffice;

use App\Entity\Order;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/orders')]
final class OrderController extends AbstractController
{
    #[Route('/', name: 'backoffice_order_index', methods: ['GET'])]
    public function index(OrderRepository $orderRepository): Response
    {
        return $this->render('BackOffice/order/index.html.twig', [
            'orders' => $orderRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'backoffice_order_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($order);
            $em->flush();

            $this->addFlash('success', 'Commande créée avec succès ✅');

            return $this->redirectToRoute('backoffice_order_index');
        }

        return $this->render('BackOffice/order/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/{id}/status', name: 'backoffice_order_update_status', methods: ['POST'])]
    public function updateStatus(Request $request, Order $order, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('update_status' . $order->getId(), $request->request->get('_token'))) {
            $order->setStatus($request->request->get('status'));
            $em->flush();
            $this->addFlash('success', 'Statut mis à jour ✅');
        }

        return $this->redirectToRoute('backoffice_order_index');
    }

    #[Route('/{id}', name: 'backoffice_order_delete', methods: ['POST'])]
    public function delete(Request $request, Order $order, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $order->getId(), $request->request->get('_token'))) {
            $em->remove($order);
            $em->flush();
            $this->addFlash('success', 'Commande supprimée ✅');
        }

        return $this->redirectToRoute('backoffice_order_index');
    }

    #[Route('/{id}', name: 'backoffice_order_show', methods: ['GET'])]
public function show(Order $order): Response
{
    return $this->render('BackOffice/order/show.html.twig', [
        'order' => $order,
    ]);
}

}
