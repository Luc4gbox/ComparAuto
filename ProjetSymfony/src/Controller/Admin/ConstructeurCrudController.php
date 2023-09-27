<?php

namespace App\Controller\Admin;

use App\Entity\Constructeur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ConstructeurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Constructeur::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
