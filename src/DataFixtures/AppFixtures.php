<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Instancier Faker
        $faker = Factory::create();

        // Ajouter des contacts
        for ($i = 0; $i < 5; $i++) {
            $contact = new Contact();
            $contact->setTitre($faker->word)
                ->setEmail($faker->email)
                ->setMessage($faker->text)
                ->setCreatedAT(new \DateTimeImmutable());

            $manager->persist($contact);
        }

        // Ajouter des services
        for ($i = 0; $i < 3; $i++) {
            $service = new Service();
            $service->setNom($faker->word)
                ->setDescription($faker->sentence(10)); // Génère une phrase de 10 mots environ

            $manager->persist($service);
        }

        // Envoyer les données en base
        $manager->flush();
    }
}
