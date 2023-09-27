<?php

namespace App\Controller;

use App\Repository\ConstructeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends AbstractController
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

    #[Route('/', name: 'app_root')]
    public function root(): Response
    {
        return $this->redirectToRoute('app_default');
    }

    #[Route('/home', name: 'app_default')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        $annonces = $annonceRepository->findBy([], ['createdAt' => 'DESC'], 10);

        return $this->render('default/index.html.twig', [
            'annonces' => $annonces,
            'constructeurs' => $this->constructeurs,
            'categories' => $this->categories,
        ]);
    }

    #[Route('/constructeur', name: 'app_constructeur')]
    public function afficherToutConstructeur(ConstructeurRepository $co): Response {
        $constructeurs = $co->findAllSortedByName();
        return $this->render('default/constructeurs.html.twig',
            ['constructeurs' => $constructeurs]);
    }

    #[Route('/comparateur/{annonce_id}', name: 'app_comparateur')]
    public function comparateur( Request $request, AnnonceRepository $annonceRepository, int $annonce_id): Response
    {
        $annonce = $annonceRepository->find($annonce_id);
        $annonces = $annonceRepository->findAll();

        $annonce2Titre = $request->query->get('annonce_id');
        $annonce2 = $annonce2Titre ? $annonceRepository->findOneBy(['titre' => $annonce2Titre]) : null;

        return $this->render('default/comparateur.html.twig', [
            'annonce' => $annonce,
            'annonces' => $annonces,
            'annonce2' => $annonce2,
        ]);
    }

    #[Route('/mes-annonces', name: 'app_annonce')]
    public function mesAnnonces(UserInterface $user, AnnonceRepository $annonceRepository): Response
    {
        // Utilisez 'utilisateur' pour récupérer les annonces associées à l'utilisateur actuel
        $annonces = $annonceRepository->findBy(['utilisateur' => $user]);

        return $this->render('default/annonces.html.twig', [
            'annonces' => $annonces,
        ]);
    }

    #[Route('/profil', name: 'app_profil')]
    public function afficherProfil(Security $security): Response
    {
        $user = $security->getUser();

        return $this->render('utilisateur/index.html.twig', [
            'user' => $user,
        ]);
    }

    
}
