<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160814222757 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE data_personal DROP FOREIGN KEY FK_3B54A458A76ED395');
        $this->addSql('ALTER TABLE data_personal ADD CONSTRAINT FK_3B54A458A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE data_personal DROP FOREIGN KEY FK_3B54A458A76ED395');
        $this->addSql('ALTER TABLE data_personal ADD CONSTRAINT FK_3B54A458A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
    }
}
