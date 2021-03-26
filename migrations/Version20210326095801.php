<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326095801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE addresses (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(80) NOT NULL, zip_code VARCHAR(20) NOT NULL, city VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, name VARCHAR(50) NOT NULL, reference VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_C82E74F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoiceItems (id INT AUTO_INCREMENT NOT NULL, invoice_id INT DEFAULT NULL, label VARCHAR(120) NOT NULL, amount_before_taxes INT NOT NULL, tax_rate INT NOT NULL, INDEX IDX_7F3FD4372989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoices (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, invoice_date DATETIME NOT NULL, invoice_number VARCHAR(10) NOT NULL, INDEX IDX_6A2F2F9519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74F5B7AF75 FOREIGN KEY (address_id) REFERENCES addresses (id)');
        $this->addSql('ALTER TABLE invoiceItems ADD CONSTRAINT FK_7F3FD4372989F1FD FOREIGN KEY (invoice_id) REFERENCES invoices (id)');
        $this->addSql('ALTER TABLE invoices ADD CONSTRAINT FK_6A2F2F9519EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E74F5B7AF75');
        $this->addSql('ALTER TABLE invoices DROP FOREIGN KEY FK_6A2F2F9519EB6921');
        $this->addSql('ALTER TABLE invoiceItems DROP FOREIGN KEY FK_7F3FD4372989F1FD');
        $this->addSql('DROP TABLE addresses');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE invoiceItems');
        $this->addSql('DROP TABLE invoices');
    }
}
