<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241117161036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD habitat_id INT NOT NULL, ADD path VARCHAR(255) DEFAULT NULL, DROP images');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FAFFE2D26 ON image (habitat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FAFFE2D26');
        $this->addSql('DROP INDEX IDX_C53D045FAFFE2D26 ON image');
        $this->addSql('ALTER TABLE image ADD images JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', DROP habitat_id, DROP path');
    }
}
