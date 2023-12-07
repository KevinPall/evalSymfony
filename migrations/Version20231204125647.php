<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204125647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, lave_vaisselle TINYINT(1) NOT NULL, lave_linge TINYINT(1) NOT NULL, climatisation TINYINT(1) NOT NULL, television TINYINT(1) NOT NULL, terrasse TINYINT(1) NOT NULL, barbecue TINYINT(1) NOT NULL, piscine VARCHAR(255) DEFAULT NULL, tennis TINYINT(1) NOT NULL, ping_pong TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gites (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT NOT NULL, localisation VARCHAR(255) NOT NULL, surface_habitable INT NOT NULL, nombre_chambres INT NOT NULL, nombre_couchages INT NOT NULL, accepte_animaux TINYINT(1) NOT NULL, tarif_animaux NUMERIC(10, 2) NOT NULL, INDEX IDX_29609B2176C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gites_equipement (gites_id INT NOT NULL, equipement_id INT NOT NULL, INDEX IDX_1FFCED5B80C9DB47 (gites_id), INDEX IDX_1FFCED5B806F0F5C (equipement_id), PRIMARY KEY(gites_id, equipement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gites_service (gites_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_89E3798E80C9DB47 (gites_id), INDEX IDX_89E3798EED5CA9E6 (service_id), PRIMARY KEY(gites_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, disponibilités VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, location_linge TINYINT(1) NOT NULL, menage_fin TINYINT(1) NOT NULL, internet TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, gite_id INT NOT NULL, prix NUMERIC(10, 2) NOT NULL, debut_periode DATETIME NOT NULL, fin_periode DATETIME NOT NULL, INDEX IDX_E7189C9652CAE9B (gite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gites ADD CONSTRAINT FK_29609B2176C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE gites_equipement ADD CONSTRAINT FK_1FFCED5B80C9DB47 FOREIGN KEY (gites_id) REFERENCES gites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gites_equipement ADD CONSTRAINT FK_1FFCED5B806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gites_service ADD CONSTRAINT FK_89E3798E80C9DB47 FOREIGN KEY (gites_id) REFERENCES gites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gites_service ADD CONSTRAINT FK_89E3798EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C9652CAE9B FOREIGN KEY (gite_id) REFERENCES gites (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gites DROP FOREIGN KEY FK_29609B2176C50E4A');
        $this->addSql('ALTER TABLE gites_equipement DROP FOREIGN KEY FK_1FFCED5B80C9DB47');
        $this->addSql('ALTER TABLE gites_equipement DROP FOREIGN KEY FK_1FFCED5B806F0F5C');
        $this->addSql('ALTER TABLE gites_service DROP FOREIGN KEY FK_89E3798E80C9DB47');
        $this->addSql('ALTER TABLE gites_service DROP FOREIGN KEY FK_89E3798EED5CA9E6');
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C9652CAE9B');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE gites');
        $this->addSql('DROP TABLE gites_equipement');
        $this->addSql('DROP TABLE gites_service');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
