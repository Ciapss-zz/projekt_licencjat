<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160813162318 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE data_personal (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, `name` VARCHAR(45) DEFAULT NULL, surname VARCHAR(45) DEFAULT NULL, pesel VARCHAR(45) DEFAULT NULL, birth_date DATE DEFAULT NULL, street VARCHAR(45) DEFAULT NULL, post_code VARCHAR(45) DEFAULT NULL, city VARCHAR(45) DEFAULT NULL, sex VARCHAR(45) DEFAULT NULL, UNIQUE INDEX UNIQ_3B54A458A76ED395 (user_id), INDEX fk_pesonal_data_user_idx (user_id), UNIQUE INDEX id_UNIQUE (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blood (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, rbc VARCHAR(45) DEFAULT NULL, hgb VARCHAR(45) DEFAULT NULL, hct VARCHAR(45) DEFAULT NULL, mcv VARCHAR(45) DEFAULT NULL, mch VARCHAR(45) DEFAULT NULL, mchc VARCHAR(45) DEFAULT NULL, wbc VARCHAR(45) DEFAULT NULL, plt VARCHAR(45) DEFAULT NULL, INDEX fk_blood_user1_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visit (id INT AUTO_INCREMENT NOT NULL, `date` VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visit_has_user (visit_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D599D30175FA0FF2 (visit_id), INDEX IDX_D599D301A76ED395 (user_id), PRIMARY KEY(visit_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctor (id INT NOT NULL, visit_idvisit INT NOT NULL, title VARCHAR(45) DEFAULT NULL, `name` VARCHAR(45) DEFAULT NULL, surname VARCHAR(45) DEFAULT NULL, specification VARCHAR(45) DEFAULT NULL, image VARCHAR(45) DEFAULT NULL, doctorcol VARCHAR(45) DEFAULT NULL, INDEX fk_doctor_visit1_idx (visit_idvisit), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE data_personal ADD CONSTRAINT FK_3B54A458A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE blood ADD CONSTRAINT FK_BF11C5BFA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE visit_has_user ADD CONSTRAINT FK_D599D30175FA0FF2 FOREIGN KEY (visit_id) REFERENCES visit (id)');
        $this->addSql('ALTER TABLE visit_has_user ADD CONSTRAINT FK_D599D301A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36AC3F281E7 FOREIGN KEY (visit_idvisit) REFERENCES visit (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE data_personal DROP FOREIGN KEY FK_3B54A458A76ED395');
        $this->addSql('ALTER TABLE blood DROP FOREIGN KEY FK_BF11C5BFA76ED395');
        $this->addSql('ALTER TABLE visit_has_user DROP FOREIGN KEY FK_D599D301A76ED395');
        $this->addSql('ALTER TABLE visit_has_user DROP FOREIGN KEY FK_D599D30175FA0FF2');
        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36AC3F281E7');
        $this->addSql('DROP TABLE data_personal');
        $this->addSql('DROP TABLE blood');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE visit');
        $this->addSql('DROP TABLE visit_has_user');
        $this->addSql('DROP TABLE doctor');
    }
}
