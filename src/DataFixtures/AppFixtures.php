<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Gites;
use App\Entity\Proprietaire;
use App\Entity\Equipement;
use App\Entity\Service;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Création de quelques propriétaires
        $proprietaires = [];
        for ($i = 0; $i < 5; $i++) {
            $proprietaire = new Proprietaire();
            $proprietaire->setNom($faker->lastName());
            $proprietaire->setPrenom($faker->firstName());
            $proprietaire->setTelephone($faker->phoneNumber());
            $manager->persist($proprietaire);
            $proprietaires[] = $proprietaire;
        }

        // Assurez-vous que les propriétaires sont flushés avant de les utiliser
        $manager->flush();

        foreach ($proprietaires as $proprietaire) {
            for ($i = 0; $i < 2; $i++) {
                $gite = new Gites();

                // ... définissez les propriétés du gîte ici
                $gite->setRegion($faker->word);
                $gite->setNom($faker->word);
                $gite->setVille($faker->city);
                $gite->setCodePostal($faker->numberBetween(1000, 9999));
                $gite->setDepartement($faker->randomElement(['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '21', '22', '23', '24', '25', '26', '27', '28', '29', '2A', '2B', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95']));
                $gite->setSurfaceHabitable($faker->numberBetween(50, 200));
                $gite->setNombreChambres($faker->numberBetween(1, 5));
                $gite->setNombreCouchages($faker->numberBetween(2, 10));
                $gite->setAccepteAnimaux($faker->boolean);
                $gite->setTarifAnimaux($faker->randomFloat(2, 10, 50));

                // Associez le gîte au propriétaire
                $gite->setProprietaire($proprietaire);

                // Ajoutez des équipements au hasard
                $equipement = new Equipement();
                $equipement->setLaveVaisselle(true);
                $equipement->setLaveLinge(true);
                $equipement->setClimatisation(true);
                $equipement->setTelevision(false);
                $equipement->setTerrasse(true);
                $equipement->setBarbecue(true);
                $equipement->setPiscine(1); // 0: Pas de piscine, 1: Piscine partagée, 2: Piscine privée
                $equipement->setTennis(true);
                $equipement->setPingPong(false);
            
                // ... autres propriétés de l'équipement
                $manager->persist($equipement);
                $gite->addEquipement($equipement);

                // Ajoutez des services au hasard
                $service = new Service();
                $service->setLocationLinge(true);
                $service->setLocationLingePrix(10.00);
                $service->setMenageFin(true);
                $service->setMenageFinPrix(20.00);
                $service->setInternet(true);
                $service->setInternetPrix(00.00);
                // ... autres propriétés et services
                $manager->persist($service);
                $gite->addService($service);

                $manager->persist($gite);
            }
        }

        // Après avoir ajouté tous les gîtes, flush les données dans la base de données
        $manager->flush();
    }
}