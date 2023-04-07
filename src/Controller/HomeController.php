<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Commentary;
use App\Repository\AnnonceRepository;
use App\Repository\CommentaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(AnnonceRepository $annonceRepository, CommentaryRepository $commentaryRepository): Response
    {
        $annonces = $annonceRepository->findAll();
        $comments = $annonceRepository->findAll();
        return $this->render('home/index.html.twig', [
            'annonces' => $annonces,
            'comments' => $comments
        ]);
    }

    #[Route('home/annonce/{annonce}', name: 'app_annonce_id')]
    public function getAnnonceId(Annonce $annonce): Response
    {

        return $this->render('home/annonceId.html.twig', [
            'annonce' => $annonce
        ]);
    }




}
