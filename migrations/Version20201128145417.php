<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128145417 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP CONSTRAINT fk_29a5ec275913aebf');
        $this->addSql('DROP SEQUENCE reserve_id_seq CASCADE');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, nom VARCHAR(30) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE reserve');
        $this->addSql('DROP INDEX idx_29a5ec275913aebf');
        $this->addSql('ALTER TABLE produit RENAME COLUMN reserve_id TO stock');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE reserve_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reserve (id INT NOT NULL, quantite_totale VARCHAR(255) NOT NULL, update_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE client');
        $this->addSql('ALTER TABLE produit RENAME COLUMN stock TO reserve_id');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT fk_29a5ec275913aebf FOREIGN KEY (reserve_id) REFERENCES reserve (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_29a5ec275913aebf ON produit (reserve_id)');
    }
}
