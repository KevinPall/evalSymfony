<?php

namespace App\Controller;

use App\Entity\Gites;
use App\Repository\TarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/gite/{id}', name: 'app_gite_detail')]
    public function show(Gites $gite, TarifRepository $tarifRepository): Response
    {
         // Récupérer les tarifs associés au gîte
         $tarifs = $tarifRepository->findTarifsByGite($gite);
         

        return $this->render('detail/index.html.twig', [
            'gite' => $gite,
            'tarifs' => $tarifs,
        ]);
    }
}
