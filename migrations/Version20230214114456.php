<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214114456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_menu ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_menu ADD CONSTRAINT FK_F0ED1832CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_F0ED1832CCD7E912 ON product_menu (menu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_menu DROP FOREIGN KEY FK_F0ED1832CCD7E912');
        $this->addSql('DROP INDEX IDX_F0ED1832CCD7E912 ON product_menu');
        $this->addSql('ALTER TABLE product_menu DROP menu_id');
    }
}
