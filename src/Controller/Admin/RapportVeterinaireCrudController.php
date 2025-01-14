<?php

namespace App\Controller\Admin;

use App\Entity\RapportVeterinaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class RapportVeterinaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportVeterinaire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('etat'),
            TextField::new('nourriture'),
            TextField::new('grammage'),
            DateTimeField::new('datePassage'),
            TextField::new('detailsetat'),

            // Champ de relation vers l'animal
            AssociationField::new('animal')
                ->setCrudController(AnimalCrudController::class)
                ->setLabel('Animal'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Rapp')
            ->setEntityLabelInSingular('Ra')
            ->setSearchFields(['etat', 'nourriture', 'grammage', 'animal.prenom']);
    }
}
