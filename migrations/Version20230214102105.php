<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214102105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_menu (id INT AUTO_INCREMENT NOT NULL, new_product_menu VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_menu_product (product_menu_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_D6353B781D0EF2A2 (product_menu_id), INDEX IDX_D6353B784584665A (product_id), PRIMARY KEY(product_menu_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_menu_product ADD CONSTRAINT FK_D6353B781D0EF2A2 FOREIGN KEY (product_menu_id) REFERENCES product_menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_menu_product ADD CONSTRAINT FK_D6353B784584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_menu_product DROP FOREIGN KEY FK_D6353B781D0EF2A2');
        $this->addSql('ALTER TABLE product_menu_product DROP FOREIGN KEY FK_D6353B784584665A');
        $this->addSql('DROP TABLE product_menu');
        $this->addSql('DROP TABLE product_menu_product');
    }
}
