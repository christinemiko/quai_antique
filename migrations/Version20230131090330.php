<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131090330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, product_name1 VARCHAR(255) NOT NULL, product_name2 VARCHAR(255) NOT NULL, product_name3 VARCHAR(255) NOT NULL, product_name4 VARCHAR(255) NOT NULL, product_name5 VARCHAR(255) NOT NULL, product_name6 VARCHAR(255) NOT NULL, product_name7 VARCHAR(255) NOT NULL, product_name8 VARCHAR(255) NOT NULL, product_name9 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE menu');
    }
}
