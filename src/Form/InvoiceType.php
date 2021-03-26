<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Invoice;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoiceDate',DateType::class, [
                "label" => "Date de la facture",
                "widget" => "single_text"
            ])
            ->add('invoiceNumber',TextType::class, ["label" => "N° de la facture"])
            ->add('client',EntityType::class, [
                "class" => Client::class,
                "choice_label" => "name",
                "expanded" => false
            ])
            ->add('items', CollectionType::class, [
                "entry_type" => InvoiceItemType::class,
                "allow_add" => true,
                "allow_delete" => true,
                "prototype" => true,
                "by_reference" => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
