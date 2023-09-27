<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Entity\Categorie;
use App\Entity\Constructeur;
use App\Entity\Quiz;
use App\Entity\Utilisateur;
use App\Entity\Voiture;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->redirect($this->adminUrlGenerator->setController(AnnonceCrudController::class)->generateUrl());
    
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CamparAuto');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Constructeur');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Creer Constructeur', 'fas fa-plus', Constructeur::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher Constructeurs', 'fas fa-eye', Constructeur::class)
        ]);

        yield MenuItem::section('Annonce');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Creer Annonce', 'fas fa-plus', Annonce::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher Annonces', 'fas fa-eye', Annonce::class)
        ]);

        yield MenuItem::section('Utilisateur');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Afficher Utilisateurs', 'fas fa-eye', Utilisateur::class)
        ]);

        yield MenuItem::section('Catégorie');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Creer Catégorie', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher Catégories', 'fas fa-eye', Categorie::class)
        ]);

        yield MenuItem::section('Quiz');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Creer Question', 'fas fa-plus', Quiz::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher Question', 'fas fa-eye', Quiz::class)
        ]);



        yield MenuItem::linkToRoute('Accueil', 'fas fa-home', 'app_default');

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
