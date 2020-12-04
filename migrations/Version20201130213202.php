<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201130213202 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_26A98456F347EFB');
        $this->addSql('ALTER TABLE achat ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE achat ALTER create_at SET NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_26A98456F347EFB ON achat (produit_id)');
        $this->addSql('ALTER TABLE fournir RENAME COLUMN create_at TO delivered_on');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_26A98456F347EFB');
        $this->addSql('CREATE SEQUENCE achat_id_seq');
        $this->addSql('SELECT setval(\'achat_id_seq\', (SELECT MAX(id) FROM achat))');
        $this->addSql('ALTER TABLE achat ALTER id SET DEFAULT nextval(\'achat_id_seq\')');
        $this->addSql('ALTER TABLE achat ALTER create_at DROP NOT NULL');
        $this->addSql('CREATE INDEX IDX_26A98456F347EFB ON achat (produit_id)');
        $this->addSql('ALTER TABLE fournir RENAME COLUMN delivered_on TO create_at');
    }
}
