<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\ProductMenu;
use App\Entity\Menu;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductMenusFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('menu',EntityType::class, [
                'class'=> Menu:: class,
                'choice_label' => 'nameMenu',
                'label' => 'Menus'
             ])
            ->add('product',EntityType::class, [
                    'class'=> Product:: class,
                    'choice_label' => 'nameProduct',
                    'label' => 'Produits'
                ])
            ->add('category', EntityType::class, [
                    'class'=> Category:: class,
                    'choice_label' => 'nameCategory',
                    'label' => 'Catégorie'
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductMenu::class,
        ]);
    }
}
