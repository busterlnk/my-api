<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231217173511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE chatgroup_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE chatgroup (id INT NOT NULL, email VARCHAR(255) DEFAULT NULL, name VARCHAR(64) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, send_email BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE incident_report ADD id_chatgroup_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE incident_report ADD CONSTRAINT FK_6913CB60E5D38121 FOREIGN KEY (id_chatgroup_id) REFERENCES chatgroup (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6913CB60E5D38121 ON incident_report (id_chatgroup_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE incident_report DROP CONSTRAINT FK_6913CB60E5D38121');
        $this->addSql('DROP SEQUENCE chatgroup_id_seq CASCADE');
        $this->addSql('DROP TABLE chatgroup');
        $this->addSql('DROP INDEX IDX_6913CB60E5D38121');
        $this->addSql('ALTER TABLE incident_report DROP id_chatgroup_id');
    }
}
