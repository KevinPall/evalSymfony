<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Gites;


class GiteSearchType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ville', ChoiceType::class, [
                'required' => false,
                'label' => 'Ville',
                'placeholder' => 'Sélectionnez une option',
                'choices' => $this->getVilles(),
            ])

            ->add('region', ChoiceType::class, [
                'required' => false,
                'label' => 'Région',
                'placeholder' => 'Sélectionnez une option',
                'choices' => $this->getRegions(),
            ])

            ->add('departement', ChoiceType::class, [
                'required' => false,
                'label' => 'Département',
                'placeholder' => 'Sélectionnez une option',
                'choices' => $this->getDepartements(),
            ])

            // Ajoutez ici les champs pour les équipements
            ->add('equipements', ChoiceType::class, [
                'required' => false,
                'label' => 'Équipements',
                'choices' => [
                    'Lave-vaisselle' => 'laveVaisselle',
                    'Lave-linge' => 'laveLinge',
                    'Climatisation' => 'climatisation',
                    'Télévision' => 'television',
                    'Terrasse' => 'terrasse',
                    'Barbecue' => 'barbecue',
                    'Tennis' => 'tennis',
                    'Ping-pong' => 'pingPong',
                ],
                'multiple' => true, // Permet de sélectionner plusieurs options
                'expanded' => true, // Affiche des checkboxes
            ])
            ->add('piscine', ChoiceType::class, [
                'required' => false,
                'label' => 'Piscine',
                'placeholder' => 'Sélectionnez une option',
                'choices' => [
                    'Pas de piscine' => 0,
                    'Piscine partagée' => 1,
                    'Piscine privée' => 2,
                ],
            ])
            // Ajoutez ici les champs pour les services
            ->add('services', ChoiceType::class, [
                'required' => false,
                'label' => 'Services',
                'choices' => [
                    'Location de linge' => 'locationLinge',
                    'Ménage en fin de séjour' => 'menageFin',
                    'Accès internet' => 'internet',
                ],
                'multiple' => true, // Permet de sélectionner plusieurs options
                'expanded' => true, // Affiche des checkboxes
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
    private function getVilles(): array
    {
        $gitesRepository = $this->entityManager->getRepository(Gites::class);
        $villes = $gitesRepository->findDistinctVilles(); // Ajoutez une méthode dans votre repository pour récupérer les villes distinctes

        $choices = [];
        foreach ($villes as $ville) {
            $choices[$ville['ville']] = $ville['ville'];
        }

        return $choices;
    }

    private function getRegions(): array
    {
        $gitesRepository = $this->entityManager->getRepository(Gites::class);
        $regions = $gitesRepository->findDistinctRegions();

        $choices = [];
        foreach ($regions as $region) {
            $choices[$region['region']] = $region['region'];
        }

        return $choices;
    }

    private function getDepartements(): array
    {
        $gitesRepository = $this->entityManager->getRepository(Gites::class);
        $departements = $gitesRepository->findDistinctDepartements();

        $choices = [];
        foreach ($departements as $departement) {
            $choices[$departement['departement']] = $departement['departement'];
        }

        return $choices;
    }
}
