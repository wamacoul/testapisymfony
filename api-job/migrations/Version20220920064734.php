<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920064734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compagny (id INT AUTO_INCREMENT NOT NULL, compagny VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE division (id INT AUTO_INCREMENT NOT NULL, division VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, compagny_id INT NOT NULL, profession_id INT NOT NULL, division_id INT NOT NULL, role_id INT NOT NULL, job VARCHAR(255) NOT NULL, job_ref VARCHAR(255) DEFAULT NULL, link VARCHAR(2000) NOT NULL, refkey CHAR(2) NULL, date_published DATETIME DEFAULT NULL, INDEX IDX_FBD8E0F81224ABE0 (compagny_id), INDEX IDX_FBD8E0F8FDEF8996 (profession_id), INDEX IDX_FBD8E0F841859289 (division_id), INDEX IDX_FBD8E0F8D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession (id INT AUTO_INCREMENT NOT NULL, profession VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F81224ABE0 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F841859289 FOREIGN KEY (division_id) REFERENCES division (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('DROP TABLE compagnies');
        $this->addSql('DROP TABLE divisions');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE professions');
        $this->addSql('DROP TABLE roles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compagnies (id INT AUTO_INCREMENT NOT NULL, compagny VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE divisions (id INT AUTO_INCREMENT NOT NULL, division VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jobs (id INT AUTO_INCREMENT NOT NULL, compagny_id INT NOT NULL, profession_id INT NOT NULL, division_id INT NOT NULL, role_id INT NOT NULL, job VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, job_ref VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, link VARCHAR(2000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, refkey CHAR(2) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_published DATETIME DEFAULT NULL, INDEX IDX_FBD8E0F841859289 (division_id), INDEX IDX_FBD8E0F81224ABE0 (compagny_id), INDEX IDX_FBD8E0F8FDEF8996 (profession_id), INDEX IDX_FBD8E0F8D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE professions (id INT AUTO_INCREMENT NOT NULL, profession VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F81224ABE0');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8FDEF8996');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F841859289');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8D60322AC');
        $this->addSql('DROP TABLE compagny');
        $this->addSql('DROP TABLE division');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE role');
    }
}
