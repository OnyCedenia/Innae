<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250916205736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD start_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD end_date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP event_date_start, DROP event_date_end, CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD event_date_start DATETIME NOT NULL, ADD event_date_end DATETIME NOT NULL, DROP start_date, DROP end_date, CHANGE description description VARCHAR(255) NOT NULL');
    }
}
