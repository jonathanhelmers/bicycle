<?php

namespace App\Controller;

use App\Entity\Bicycle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class BicycleController extends AbstractController
{
    #[Route('/main', name: 'main')]
    public function main(EntityManagerInterface $entityManager): Response
    {
        $bicycleRepository = $entityManager->getRepository('Bicycle');
        $bicycle = $bicycleRepository->findAll();

        if($bicycle == null){
            $bicycle = new Bicycle();
        }

        return $this->render('templates/base.html.twig', [
            'bicycle' => $bicycle,
        ]);
    }


}