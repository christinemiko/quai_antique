<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214115437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_menu ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_menu ADD CONSTRAINT FK_F0ED18324584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_F0ED18324584665A ON product_menu (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_menu DROP FOREIGN KEY FK_F0ED18324584665A');
        $this->addSql('DROP INDEX IDX_F0ED18324584665A ON product_menu');
        $this->addSql('ALTER TABLE product_menu DROP product_id');
    }
}
