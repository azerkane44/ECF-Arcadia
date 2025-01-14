<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

// src/Controller/Admin/ServiceCrudController.php
class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // Utilisez des classes de champs adaptées
            IdField::new('id')->hideOnForm(),  // Masquer le champ ID lors de l'ajout d'un nouveau service
            TextField::new('nom'),             // Afficher le champ "nom"
            TextField::new('description'),
            // Afficher le champ "description" avec un éditeur de texte
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Services') // Nom de l'entité au pluriel
            ->setEntityLabelInSingular('Service') // Nom de l'entité au singulier
            ->setSearchFields(['nom', 'description']); // Ajouter les champs à rechercher dans la liste
    }
}
