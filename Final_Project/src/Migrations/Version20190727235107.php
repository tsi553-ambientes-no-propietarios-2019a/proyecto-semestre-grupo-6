<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190727235107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, usrfk_id INT NOT NULL, question VARCHAR(255) NOT NULL, categorie VARCHAR(30) NOT NULL, answer VARCHAR(255) NOT NULL, option1 VARCHAR(255) NOT NULL, option2 VARCHAR(255) NOT NULL, option3 VARCHAR(255) NOT NULL, INDEX IDX_8ADC54D579ADC82C (usrfk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tries (id INT AUTO_INCREMENT NOT NULL, usrfk_id INT NOT NULL, date DATE NOT NULL, total_score INT NOT NULL, w_score INT NOT NULL, r_score INT NOT NULL, INDEX IDX_9DC696CE79ADC82C (usrfk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE control (id INT AUTO_INCREMENT NOT NULL, questionsfk_id INT NOT NULL, tryfk_id INT NOT NULL, answer VARCHAR(255) NOT NULL, INDEX IDX_EDDB2C4BE5F2CD99 (questionsfk_id), INDEX IDX_EDDB2C4B79B733C5 (tryfk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, questionsfk_id INT NOT NULL, option1 VARCHAR(255) NOT NULL, option2 VARCHAR(255) NOT NULL, option3 VARCHAR(255) NOT NULL, INDEX IDX_D035FA87E5F2CD99 (questionsfk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D579ADC82C FOREIGN KEY (usrfk_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE tries ADD CONSTRAINT FK_9DC696CE79ADC82C FOREIGN KEY (usrfk_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE control ADD CONSTRAINT FK_EDDB2C4BE5F2CD99 FOREIGN KEY (questionsfk_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE control ADD CONSTRAINT FK_EDDB2C4B79B733C5 FOREIGN KEY (tryfk_id) REFERENCES tries (id)');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_D035FA87E5F2CD99 FOREIGN KEY (questionsfk_id) REFERENCES questions (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE control DROP FOREIGN KEY FK_EDDB2C4BE5F2CD99');
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_D035FA87E5F2CD99');
        $this->addSql('ALTER TABLE control DROP FOREIGN KEY FK_EDDB2C4B79B733C5');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D579ADC82C');
        $this->addSql('ALTER TABLE tries DROP FOREIGN KEY FK_9DC696CE79ADC82C');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE tries');
        $this->addSql('DROP TABLE control');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE options');
    }
}
