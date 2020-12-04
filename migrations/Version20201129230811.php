<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201129230811 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE achat_id_sequ CASCADE');
        $this->addSql('ALTER TABLE achat ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achat ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE achat ALTER create_at SET NOT NULL');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A98456F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_26A98456F347EFB ON achat (produit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE achat_id_sequ INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE achat DROP CONSTRAINT FK_26A98456F347EFB');
        $this->addSql('DROP INDEX UNIQ_26A98456F347EFB');
        $this->addSql('ALTER TABLE achat DROP produit_id');
        $this->addSql('CREATE SEQUENCE achat_id_seq');
        $this->addSql('SELECT setval(\'achat_id_seq\', (SELECT MAX(id) FROM achat))');
        $this->addSql('ALTER TABLE achat ALTER id SET DEFAULT nextval(\'achat_id_seq\')');
        $this->addSql('ALTER TABLE achat ALTER create_at DROP NOT NULL');
    }
}
