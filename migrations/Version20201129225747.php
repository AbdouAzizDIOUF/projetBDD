<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201129225747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE acheter_id_sequ CASCADE');
        $this->addSql('DROP SEQUENCE acheter_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE achat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE achat (id INT NOT NULL, quantite INT NOT NULL, create_at DATE NOT NULL, prix_total DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE acheter');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE achat_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE acheter_id_sequ INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE acheter_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE acheter (id SERIAL NOT NULL, quantite INT NOT NULL, create_at DATE DEFAULT NULL, prix_total DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE achat');
    }
}
