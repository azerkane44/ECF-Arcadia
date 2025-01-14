<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('prenom'),
            TextField::new('race'),
            ImageField::new('imageanimaux', 'Image de l\'animal')
                ->setBasePath('/uploads/images')  // Chemin relatif pour l'accès public
                ->setUploadDir('public/uploads/images') // Dossier de stockage
                ->setRequired(false)
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('habitatanimaux', 'Habitat associé'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Animaux')
            ->setEntityLabelInSingular('Animal')
            ->setSearchFields(['prenom', 'race', 'habitatanimaux']);
    }
}
