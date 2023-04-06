<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230406104959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acquisition (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, annonce_id_id INT DEFAULT NULL, address_id_id INT DEFAULT NULL, INDEX IDX_2FEB90339D86650F (user_id_id), UNIQUE INDEX UNIQ_2FEB903368C955C8 (annonce_id_id), INDEX IDX_2FEB903348E1E977 (address_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, street VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip INT NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 0) NOT NULL, is_visible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bank (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, amount NUMERIC(10, 0) NOT NULL, UNIQUE INDEX UNIQ_D860BF7A9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentary (id INT AUTO_INCREMENT NOT NULL, annonce_id_id INT DEFAULT NULL, user_id_id INT NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_1CAC12CA68C955C8 (annonce_id_id), INDEX IDX_1CAC12CA9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acquisition ADD CONSTRAINT FK_2FEB90339D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE acquisition ADD CONSTRAINT FK_2FEB903368C955C8 FOREIGN KEY (annonce_id_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE acquisition ADD CONSTRAINT FK_2FEB903348E1E977 FOREIGN KEY (address_id_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bank ADD CONSTRAINT FK_D860BF7A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CA68C955C8 FOREIGN KEY (annonce_id_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CA9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acquisition DROP FOREIGN KEY FK_2FEB90339D86650F');
        $this->addSql('ALTER TABLE acquisition DROP FOREIGN KEY FK_2FEB903368C955C8');
        $this->addSql('ALTER TABLE acquisition DROP FOREIGN KEY FK_2FEB903348E1E977');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE bank DROP FOREIGN KEY FK_D860BF7A9D86650F');
        $this->addSql('ALTER TABLE commentary DROP FOREIGN KEY FK_1CAC12CA68C955C8');
        $this->addSql('ALTER TABLE commentary DROP FOREIGN KEY FK_1CAC12CA9D86650F');
        $this->addSql('DROP TABLE acquisition');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE bank');
        $this->addSql('DROP TABLE commentary');
        $this->addSql('DROP TABLE user');
    }
}
