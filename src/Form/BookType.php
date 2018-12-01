<?php

namespace App\Form;

use App\Entity\Book\Book;
use App\Entity\Category\Category;
use App\Form\Media\MediaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Title',
                    ],
                ]
            )
            ->add(
                'description',
                TextareaType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Description',
                    ],
                ]
            )
            ->add(
                'author',
                TextType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Author',
                    ],
                ]
            )
            ->add(
                'yearPublication',
                NumberType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Year publication',
                    ],
                ]
            )
            ->add(
                'pageCount',
                NumberType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Page count',
                    ],
                ]
            )
            ->add(
                'category',
                EntityType::class,
                [
                    'placeholder' => 'Choose category',
                    'class' => Category::class,
                    'choice_label' => 'name',
                    'mapped' => true,
                    'expanded' => false,
                    'multiple' => false,
                    'constraints' => [
                        new NotBlank(),
                    ],
                ]
            )
            ->add(
                'media',
                MediaType::class,
                [
                    'label' => 'Photo',
                    'constraints' => [
                        new NotBlank(),
                    ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Book::class,
            ]
        );
    }
}
