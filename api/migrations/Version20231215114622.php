<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215114622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE chatoperator_operatorid_seq CASCADE');
        $this->addSql('DROP TABLE chatoperator');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE chatoperator_operatorid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE chatoperator (operatorid INT NOT NULL, vclogin VARCHAR(255) NOT NULL, vcpassword VARCHAR(255) NOT NULL, vcemail VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, PRIMARY KEY(operatorid))');
        $this->addSql('CREATE UNIQUE INDEX uniq_efe08a95f09e7b96 ON chatoperator (vclogin)');
    }
}
