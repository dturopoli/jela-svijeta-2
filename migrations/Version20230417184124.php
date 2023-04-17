<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230417184124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(128) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles1 (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(128) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_translation (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, language_id VARCHAR(5) NOT NULL, title VARCHAR(50) NOT NULL, INDEX IDX_3F2070412469DE2 (category_id), INDEX IDX_3F2070482F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_translation (id INT AUTO_INCREMENT NOT NULL, ingredient_id INT NOT NULL, language_id VARCHAR(5) NOT NULL, title VARCHAR(50) NOT NULL, INDEX IDX_C1A8BF6933FE08C (ingredient_id), INDEX IDX_C1A8BF682F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id VARCHAR(5) NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9EF68E9C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal_ingredient (id INT AUTO_INCREMENT NOT NULL, meal_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_FCC3CEFA639666D6 (meal_id), INDEX IDX_FCC3CEFA933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal_tag (id INT AUTO_INCREMENT NOT NULL, meal_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_78E3E97639666D6 (meal_id), INDEX IDX_78E3E97BAD26311 (tag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal_translation (id INT AUTO_INCREMENT NOT NULL, meal_id INT NOT NULL, language_id VARCHAR(5) NOT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_B99343E7639666D6 (meal_id), INDEX IDX_B99343E782F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_translation (id INT AUTO_INCREMENT NOT NULL, tag_id INT NOT NULL, language_id VARCHAR(5) NOT NULL, title VARCHAR(50) NOT NULL, INDEX IDX_A8A03F8FBAD26311 (tag_id), INDEX IDX_A8A03F8F82F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_translation ADD CONSTRAINT FK_3F2070412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE category_translation ADD CONSTRAINT FK_3F2070482F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE ingredient_translation ADD CONSTRAINT FK_C1A8BF6933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE ingredient_translation ADD CONSTRAINT FK_C1A8BF682F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE meal ADD CONSTRAINT FK_9EF68E9C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE meal_ingredient ADD CONSTRAINT FK_FCC3CEFA639666D6 FOREIGN KEY (meal_id) REFERENCES meal (id)');
        $this->addSql('ALTER TABLE meal_ingredient ADD CONSTRAINT FK_FCC3CEFA933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE meal_tag ADD CONSTRAINT FK_78E3E97639666D6 FOREIGN KEY (meal_id) REFERENCES meal (id)');
        $this->addSql('ALTER TABLE meal_tag ADD CONSTRAINT FK_78E3E97BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE meal_translation ADD CONSTRAINT FK_B99343E7639666D6 FOREIGN KEY (meal_id) REFERENCES meal (id)');
        $this->addSql('ALTER TABLE meal_translation ADD CONSTRAINT FK_B99343E782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE tag_translation ADD CONSTRAINT FK_A8A03F8FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE tag_translation ADD CONSTRAINT FK_A8A03F8F82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_translation DROP FOREIGN KEY FK_3F2070412469DE2');
        $this->addSql('ALTER TABLE category_translation DROP FOREIGN KEY FK_3F2070482F1BAF4');
        $this->addSql('ALTER TABLE ingredient_translation DROP FOREIGN KEY FK_C1A8BF6933FE08C');
        $this->addSql('ALTER TABLE ingredient_translation DROP FOREIGN KEY FK_C1A8BF682F1BAF4');
        $this->addSql('ALTER TABLE meal DROP FOREIGN KEY FK_9EF68E9C12469DE2');
        $this->addSql('ALTER TABLE meal_ingredient DROP FOREIGN KEY FK_FCC3CEFA639666D6');
        $this->addSql('ALTER TABLE meal_ingredient DROP FOREIGN KEY FK_FCC3CEFA933FE08C');
        $this->addSql('ALTER TABLE meal_tag DROP FOREIGN KEY FK_78E3E97639666D6');
        $this->addSql('ALTER TABLE meal_tag DROP FOREIGN KEY FK_78E3E97BAD26311');
        $this->addSql('ALTER TABLE meal_translation DROP FOREIGN KEY FK_B99343E7639666D6');
        $this->addSql('ALTER TABLE meal_translation DROP FOREIGN KEY FK_B99343E782F1BAF4');
        $this->addSql('ALTER TABLE tag_translation DROP FOREIGN KEY FK_A8A03F8FBAD26311');
        $this->addSql('ALTER TABLE tag_translation DROP FOREIGN KEY FK_A8A03F8F82F1BAF4');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE articles1');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_translation');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE ingredient_translation');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE meal');
        $this->addSql('DROP TABLE meal_ingredient');
        $this->addSql('DROP TABLE meal_tag');
        $this->addSql('DROP TABLE meal_translation');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_translation');
        $this->addSql('DROP TABLE messenger_messages');
    }
}