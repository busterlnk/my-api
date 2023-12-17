<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231217150833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE incident_report_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE incident_report (id INT NOT NULL, id_chatoperator_id INT DEFAULT NULL, invoice_number VARCHAR(64) DEFAULT NULL, name VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6913CB6015A1EEF5 ON incident_report (id_chatoperator_id)');
        $this->addSql('ALTER TABLE incident_report ADD CONSTRAINT FK_6913CB6015A1EEF5 FOREIGN KEY (id_chatoperator_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE incident_report_id_seq CASCADE');
        $this->addSql('ALTER TABLE incident_report DROP CONSTRAINT FK_6913CB6015A1EEF5');
        $this->addSql('DROP TABLE incident_report');
    }
}
