<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190423064923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__membre AS SELECT id, nom, prenom, taille, poids, homeworld, biographie, description, impression, actif, avatar, updated_at, role, genre, titre FROM membre');
        $this->addSql('DROP TABLE membre');
        $this->addSql('CREATE TABLE membre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE BINARY, prenom VARCHAR(255) NOT NULL COLLATE BINARY, taille INTEGER NOT NULL, poids INTEGER NOT NULL, homeworld VARCHAR(255) NOT NULL COLLATE BINARY, biographie CLOB DEFAULT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, impression CLOB DEFAULT NULL COLLATE BINARY, actif BOOLEAN NOT NULL, avatar VARCHAR(255) DEFAULT NULL COLLATE BINARY, updated_at DATETIME NOT NULL, genre VARCHAR(255) NOT NULL COLLATE BINARY, titre VARCHAR(255) DEFAULT NULL COLLATE BINARY, classe VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO membre (id, nom, prenom, taille, poids, homeworld, biographie, description, impression, actif, avatar, updated_at, classe, genre, titre) SELECT id, nom, prenom, taille, poids, homeworld, biographie, description, impression, actif, avatar, updated_at, role, genre, titre FROM __temp__membre');
        $this->addSql('DROP TABLE __temp__membre');
        $this->addSql('DROP INDEX UNIQ_93E70285E315342');
        $this->addSql('CREATE TEMPORARY TABLE __temp__membre_hrp AS SELECT id, personnage_id, prenom, email, password, created_at FROM membre_hrp');
        $this->addSql('DROP TABLE membre_hrp');
        $this->addSql('CREATE TABLE membre_hrp (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, personnage_id INTEGER NOT NULL, prenom VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, CONSTRAINT FK_93E70285E315342 FOREIGN KEY (personnage_id) REFERENCES membre (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO membre_hrp (id, personnage_id, prenom, email, password, created_at) SELECT id, personnage_id, prenom, email, password, created_at FROM __temp__membre_hrp');
        $this->addSql('DROP TABLE __temp__membre_hrp');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93E70285E315342 ON membre_hrp (personnage_id)');
        $this->addSql('ALTER TABLE race ADD COLUMN description CLOB DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__membre AS SELECT id, nom, prenom, taille, poids, homeworld, biographie, description, impression, actif, avatar, updated_at, classe, genre, titre FROM membre');
        $this->addSql('DROP TABLE membre');
        $this->addSql('CREATE TABLE membre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, taille INTEGER NOT NULL, poids INTEGER NOT NULL, homeworld VARCHAR(255) NOT NULL, biographie CLOB DEFAULT NULL, description CLOB DEFAULT NULL, impression CLOB DEFAULT NULL, actif BOOLEAN NOT NULL, avatar VARCHAR(255) DEFAULT NULL, updated_at DATETIME NOT NULL, genre VARCHAR(255) NOT NULL, titre VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO membre (id, nom, prenom, taille, poids, homeworld, biographie, description, impression, actif, avatar, updated_at, role, genre, titre) SELECT id, nom, prenom, taille, poids, homeworld, biographie, description, impression, actif, avatar, updated_at, classe, genre, titre FROM __temp__membre');
        $this->addSql('DROP TABLE __temp__membre');
        $this->addSql('DROP INDEX UNIQ_93E70285E315342');
        $this->addSql('CREATE TEMPORARY TABLE __temp__membre_hrp AS SELECT id, personnage_id, prenom, email, password, created_at FROM membre_hrp');
        $this->addSql('DROP TABLE membre_hrp');
        $this->addSql('CREATE TABLE membre_hrp (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, personnage_id INTEGER NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO membre_hrp (id, personnage_id, prenom, email, password, created_at) SELECT id, personnage_id, prenom, email, password, created_at FROM __temp__membre_hrp');
        $this->addSql('DROP TABLE __temp__membre_hrp');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93E70285E315342 ON membre_hrp (personnage_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__race AS SELECT id, race, image FROM race');
        $this->addSql('DROP TABLE race');
        $this->addSql('CREATE TABLE race (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, race VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO race (id, race, image) SELECT id, race, image FROM __temp__race');
        $this->addSql('DROP TABLE __temp__race');
    }
}
