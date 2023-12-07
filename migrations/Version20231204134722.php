<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204134722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gites ADD ville VARCHAR(255) NOT NULL, ADD departement VARCHAR(255) NOT NULL, CHANGE localisation region VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE service ADD location_linge_prix DOUBLE PRECISION NOT NULL, ADD menage_fin_prix DOUBLE PRECISION NOT NULL, ADD internet_prix DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gites ADD localisation VARCHAR(255) NOT NULL, DROP region, DROP ville, DROP departement');
        $this->addSql('ALTER TABLE service DROP location_linge_prix, DROP menage_fin_prix, DROP internet_prix');
    }
}
