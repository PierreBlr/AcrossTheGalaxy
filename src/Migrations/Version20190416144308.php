<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190416144308 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE competences (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, niveau INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE membre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, taille INTEGER NOT NULL, poids INTEGER NOT NULL, homeworld VARCHAR(255) NOT NULL, biographie CLOB DEFAULT NULL, description CLOB DEFAULT NULL, impression CLOB DEFAULT NULL, actif BOOLEAN NOT NULL, avatar VARCHAR(255) DEFAULT NULL, updated_at DATETIME NOT NULL, role VARCHAR(255) DEFAULT NULL, genre VARCHAR(255) NOT NULL, titre VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE membre_hrp (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, personnage_id INTEGER NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93E70285E315342 ON membre_hrp (personnage_id)');
        $this->addSql('CREATE TABLE objet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE profession (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE race (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, race VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE competences');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE membre_hrp');
        $this->addSql('DROP TABLE objet');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE race');
    }
}
