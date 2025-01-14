<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241116210813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habitat ADD commentaire_habitat LONGTEXT DEFAULT NULL, DROP create_at, DROP images, DROP animaux, DROP is_done, CHANGE nom nom VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habitat ADD create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD images JSON NOT NULL COMMENT \'(DC2Type:json)\', ADD animaux LONGTEXT NOT NULL, ADD is_done TINYINT(1) NOT NULL, DROP commentaire_habitat, CHANGE nom nom VARCHAR(255) NOT NULL');
    }
}
