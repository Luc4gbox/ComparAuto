<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Entity\Carburant;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Core\Security;

class AnnonceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonce::class;
    }

    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function configureFields(string $pageName): iterable
    {
        $carburantChoices = array_map(fn($carburant) => $carburant->name, Carburant::cases());
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('utilisateur')->hideOnForm(),
            TextField::new('titre'),
            TextField::new('description'),

            AssociationField::new('constructeur') // Ajout du champ pour choisir le constructeur
            ->autocomplete()
                ->setCrudController(ConstructeurCrudController::class), // Ajout du contrôleur CRUD pour l'entité Constructeur
            AssociationField::new('categorie') // Ajout du champ pour choisir la catégorie
            ->autocomplete()
                ->setCrudController(CategorieCrudController::class),
            TextField::new('nom_voiture'),
            IntegerField::new('annee'),
            IntegerField::new('kilometrage', 'Kilométrage'),
            TextField::new('couleur'),
            ChoiceField::new('type_carburant')
                ->setChoices(array_combine($carburantChoices, $carburantChoices))
                ->renderAsNativeWidget(),
            MoneyField::new('prix')->setCurrency('EUR')->setStoredAsCents(false),
            TextField::new('motorisation'),
            IntegerField::new('puissance'),
            IntegerField::new('poidsTotal'),
            IntegerField::new('stockageCoffre'),
            ImageField::new('image')->setUploadDir('public/images/annonces'),
            DateTimeField::new('createdAt')->hideOnForm(),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Annonce) return;

        $entityInstance->setUtilisateur($this->security->getUser());

        $entityInstance->setCreatedAt(new \DateTimeImmutable);

        parent::persistEntity($em, $entityInstance);
    }
}
