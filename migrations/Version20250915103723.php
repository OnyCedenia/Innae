<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250915103723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD location VARCHAR(255) DEFAULT NULL, ADD image VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE description description LONGTEXT NOT NULL, CHANGE event_date_start event_date_start DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE event_date_end event_date_end DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP location, DROP image, DROP created_at, CHANGE description description VARCHAR(255) NOT NULL, CHANGE event_date_start event_date_start DATETIME NOT NULL, CHANGE event_date_end event_date_end DATETIME NOT NULL');
    }
}
