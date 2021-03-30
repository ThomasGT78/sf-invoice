<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InvoiceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Invoice 1
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \DateTime())
            ->setInvoiceNumber("00001")
            ->setClient($this->getReference("client_1"));
        $manager->persist($invoice);

        //Invoice 2
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \DateTime())
            ->setInvoiceNumber("00002")
            ->setClient($this->getReference("client_1"));
        $manager->persist($invoice);

        //Invoice 3
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \DateTime())
            ->setInvoiceNumber("00003")
            ->setClient($this->getReference("client_2"));
        $manager->persist($invoice);


        $manager->flush();
    }

    public function getDependencies(ObjectManager $manager)
    {
        return [
            ClientFixtures::class
        ];

        $manager->flush();
    }
}
