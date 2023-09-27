<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AnnonceRepository;
use Symfony\Component\Routing\Annotation\Route;


class SearchController extends AbstractController
{
    private $constructeurs;
    private $categories;

    public function setConstructeurs($constructeurs)
    {
        $this->constructeurs = $constructeurs;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }


    #[Route('/recherche', name: 'app_recherche')]
    public function recherche(Request $request, AnnonceRepository $annonceRepository)
    {

        $query = $request->query->get('query');
        $constructeur = $request->query->get('constructeur');
        $categorie = $request->query->get('categorie');
        $min_price = $request->query->get('min_price');
        $max_price = $request->query->get('max_price');

        $annonces = $annonceRepository->searchAnnonces($query, $constructeur, $categorie, $min_price, $max_price);

        return $this->render('default/recherche.html.twig', [
            'annonces' => $annonces,
            'constructeurs' => $this->constructeurs,
            'categories' => $this->categories,
            'query' => $query,
        ]);
    }
}
