<?php

namespace App\Entity;

use App\Repository\InvoiceItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceItemRepository::class)
 * @ORM\Table(name="invoiceItems")
 */
class InvoiceItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $label;

    /**
     * @ORM\Column(type="integer")
     */
    private $amountBeforeTaxes;

    /**
     * @ORM\Column(type="integer")
     */
    private $taxRate = 20;

    /**
     * @ORM\ManyToOne(targetEntity=Invoice::class, inversedBy="items")
     */
    private $invoice;

    /**
     * @ORM\Column(type="integer", options={"default": 1})
     */
    private $qt = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getAmountBeforeTaxes(): ?int
    {
        return $this->amountBeforeTaxes;
    }

    public function setAmountBeforeTaxes(int $amountBeforeTaxes): self
    {
        $this->amountBeforeTaxes = $amountBeforeTaxes;

        return $this;
    }

    public function getTaxRate(): ?int
    {
        return $this->taxRate;
    }

    public function setTaxRate(int $taxRate): self
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getQt(): ?int
    {
        return $this->qt;
    }

    public function setQt(int $qt): self
    {
        $this->qt = $qt;

        return $this;
    }

    public function getTotalBeforeTax(){
        return $this->qt * $this->amountBeforeTaxes;
    }
}
