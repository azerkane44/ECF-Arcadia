<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241117003001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_images (animal_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_5AEE7BB68E962C16 (animal_id), INDEX IDX_5AEE7BB63DA5256D (image_id), PRIMARY KEY(animal_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitat_images (habitat_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_4A4A18D1AFFE2D26 (habitat_id), INDEX IDX_4A4A18D13DA5256D (image_id), PRIMARY KEY(habitat_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal_images ADD CONSTRAINT FK_5AEE7BB68E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_images ADD CONSTRAINT FK_5AEE7BB63DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE habitat_images ADD CONSTRAINT FK_4A4A18D1AFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE habitat_images ADD CONSTRAINT FK_4A4A18D13DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_images DROP FOREIGN KEY FK_5AEE7BB68E962C16');
        $this->addSql('ALTER TABLE animal_images DROP FOREIGN KEY FK_5AEE7BB63DA5256D');
        $this->addSql('ALTER TABLE habitat_images DROP FOREIGN KEY FK_4A4A18D1AFFE2D26');
        $this->addSql('ALTER TABLE habitat_images DROP FOREIGN KEY FK_4A4A18D13DA5256D');
        $this->addSql('DROP TABLE animal_images');
        $this->addSql('DROP TABLE habitat_images');
    }
}
