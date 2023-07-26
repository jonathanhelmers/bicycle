<?php

namespace App\Controller;

use App\Entity\Bicycle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class BicycleController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     *
     * @return Response
     * @Route("/main", name="main")
     */
    public function main(EntityManagerInterface $entityManager): Response
    {
        $bicycleRepository = $entityManager->getRepository('Bicycle');
        $bicycle = $bicycleRepository->findAll();

        if($bicycle == null){
            $bicycle = new Bicycle();
        }

        $entityManager->persist($bicycle);
        $entityManager->flush();

        return $this->render('templates/base.html.twig', [
            'bicycle' => $bicycle,
        ]);
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param string $id
     *
     * @return RedirectResponse
     * @Route("/ride/{id}", requirements={"id" = "\d+"}, name="ride")
     */
    public function ride(EntityManagerInterface $entityManager, string $id): Response
    {
        $bicycleRepository = $entityManager->getRepository('Bicycle');
        $bicycle = $bicycleRepository->findoneBy(['id' => $id]);

        $bicycle = $bicycle->ride();

        $entityManager->persist($bicycle);
        $entityManager->flush();

        return $this->redirectToRoute('main');
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param string $id
     *
     * @return RedirectResponse
     * @Route("/shiftUp", requirements={"id" = "\d+"}, name="shiftUp")
     */
    public function shiftUp(EntityManagerInterface $entityManager, string $id): Response
    {
        $bicycleRepository = $entityManager->getRepository('Bicycle');
        $bicycle = $bicycleRepository->findoneBy(['id' => $id]);

        $bicycle = $bicycle->shiftUp();

        $entityManager->persist($bicycle);
        $entityManager->flush();

        return $this->redirectToRoute('main');
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param string $id
     *
     * @return RedirectResponse
     * @Route("/shiftDown", requirements={"id" = "\d+"}, name="shiftDown")
     */
    public function shiftDown(EntityManagerInterface $entityManager, string $id): Response
    {
        $bicycleRepository = $entityManager->getRepository('Bicycle');
        $bicycle = $bicycleRepository->findoneBy(['id' => $id]);

        $bicycle = $bicycle->shiftDown();

        $entityManager->persist($bicycle);
        $entityManager->flush();

        return $this->redirectToRoute('main');
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param string $id
     *
     * @return RedirectResponse
     * @Route("/inflateTires", requirements={"id" = "\d+"}, name="inflateTires")
     */
    public function inflateTires(EntityManagerInterface $entityManager, string $id): Response
    {
        $bicycleRepository = $entityManager->getRepository('Bicycle');
        $bicycle = $bicycleRepository->findoneBy(['id' => $id]);

        $bicycle = $bicycle->inflateTires();

        $entityManager->persist($bicycle);
        $entityManager->flush();

        return $this->redirectToRoute('main');
    }
}