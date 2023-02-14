<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214085514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu DROP product_name1, DROP product_name2, DROP product_name3, DROP product_name4, DROP product_name5, DROP product_name6, DROP product_name7, DROP product_name8, DROP product_name9');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu ADD product_name1 VARCHAR(255) NOT NULL, ADD product_name2 VARCHAR(255) NOT NULL, ADD product_name3 VARCHAR(255) NOT NULL, ADD product_name4 VARCHAR(255) NOT NULL, ADD product_name5 VARCHAR(255) NOT NULL, ADD product_name6 VARCHAR(255) NOT NULL, ADD product_name7 VARCHAR(255) NOT NULL, ADD product_name8 VARCHAR(255) NOT NULL, ADD product_name9 VARCHAR(255) NOT NULL');
    }
}
