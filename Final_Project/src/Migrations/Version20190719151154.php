<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190719151154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE control ADD questionsfk_id INT NOT NULL, ADD tryfk_id INT NOT NULL');
        $this->addSql('ALTER TABLE control ADD CONSTRAINT FK_EDDB2C4BE5F2CD99 FOREIGN KEY (questionsfk_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE control ADD CONSTRAINT FK_EDDB2C4B79B733C5 FOREIGN KEY (tryfk_id) REFERENCES tries (id)');
        $this->addSql('CREATE INDEX IDX_EDDB2C4BE5F2CD99 ON control (questionsfk_id)');
        $this->addSql('CREATE INDEX IDX_EDDB2C4B79B733C5 ON control (tryfk_id)');
        $this->addSql('ALTER TABLE questions ADD usrfk_id INT NOT NULL');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D579ADC82C FOREIGN KEY (usrfk_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_8ADC54D579ADC82C ON questions (usrfk_id)');
        $this->addSql('ALTER TABLE tries ADD usrfk_id INT NOT NULL');
        $this->addSql('ALTER TABLE tries ADD CONSTRAINT FK_9DC696CE79ADC82C FOREIGN KEY (usrfk_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_9DC696CE79ADC82C ON tries (usrfk_id)');
        $this->addSql('ALTER TABLE options ADD questionsfk_id INT NOT NULL');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_D035FA87E5F2CD99 FOREIGN KEY (questionsfk_id) REFERENCES questions (id)');
        $this->addSql('CREATE INDEX IDX_D035FA87E5F2CD99 ON options (questionsfk_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE control DROP FOREIGN KEY FK_EDDB2C4BE5F2CD99');
        $this->addSql('ALTER TABLE control DROP FOREIGN KEY FK_EDDB2C4B79B733C5');
        $this->addSql('DROP INDEX IDX_EDDB2C4BE5F2CD99 ON control');
        $this->addSql('DROP INDEX IDX_EDDB2C4B79B733C5 ON control');
        $this->addSql('ALTER TABLE control DROP questionsfk_id, DROP tryfk_id');
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_D035FA87E5F2CD99');
        $this->addSql('DROP INDEX IDX_D035FA87E5F2CD99 ON options');
        $this->addSql('ALTER TABLE options DROP questionsfk_id');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D579ADC82C');
        $this->addSql('DROP INDEX IDX_8ADC54D579ADC82C ON questions');
        $this->addSql('ALTER TABLE questions DROP usrfk_id');
        $this->addSql('ALTER TABLE tries DROP FOREIGN KEY FK_9DC696CE79ADC82C');
        $this->addSql('DROP INDEX IDX_9DC696CE79ADC82C ON tries');
        $this->addSql('ALTER TABLE tries DROP usrfk_id');
    }
}
