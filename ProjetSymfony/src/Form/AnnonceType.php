<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Constructeur;
use App\Entity\Categorie;
use App\Entity\Carburant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;

class  AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $carburantChoices = array_map(fn($carburant) => $carburant->name, Carburant::cases());

        $builder
            ->add('titre')
            ->add('description')
            ->add('prix')
            ->add('constructeur', EntityType::class, [
                'class' => Constructeur::class,
                'choice_label' => 'nom',
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
            ])
            ->add('nom_voiture', null, [
                'label' => 'Nom du véhicule'
            ])            ->add('annee')
            ->add('kilometrage')
            ->add('couleur')
            ->add('type_carburant', ChoiceType::class, [
                'choices' => array_combine($carburantChoices, $carburantChoices),
                'attr' => ['class' => 'form-select'], // Pour un rendu de widget natif
            ])
            ->add('motorisation')
            ->add('puissance', null, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Veuillez entrer une puissance.']),
                    new Assert\Type([
                        'type' => 'numeric',
                        'message' => 'Veuillez entrer un nombre valide pour la puissance.',
                    ]),
                ],
                'invalid_message' => 'Veuillez entrer un nombre valide pour la puissance.',
            ])
            ->add('poidsTotal')
            ->add('stockageCoffre')
            ->add('image', FileType::class, [
                'label' => 'Image (PNG, JPG)',
                'required' => true,
                'mapped' => false,
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\Image([
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide (PNG, JPG).',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
