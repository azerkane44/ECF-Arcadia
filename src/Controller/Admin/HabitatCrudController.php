<?php

namespace App\Controller\Admin;

use App\Entity\Habitat;
use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;





class HabitatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Habitat::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextEditorField::new('description'),
            TextEditorField::new('commentaire_habitat'),
            Imagefield::new('imagefield')
                ->setBasePath('/uploads/images')  // Le chemin relatif vers les images
                ->setUploadDir('public/uploads/images') // Répertoire où les images sont téléchargées
                ->setRequired(false) // Si l'image est optionnelle
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Configuration des habitats')
            ->setEntityLabelInSingular('Animaux')
            ->setSearchFields(['nom', 'description', 'commentaire_habitat']);
    }
}
