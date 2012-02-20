<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120220140020 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE club_ranking_match_team (id INT AUTO_INCREMENT NOT NULL, match_id INT DEFAULT NULL, INDEX IDX_6349B8062ABEACD6 (match_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE club_ranking_match_team ADD CONSTRAINT FK_6349B8062ABEACD6 FOREIGN KEY (match_id) REFERENCES club_ranking_match(id)");
        $this->addSql("DROP TABLE MatchTeam");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE MatchTeam (id INT AUTO_INCREMENT NOT NULL, match_id INT DEFAULT NULL, INDEX IDX_AF0633A62ABEACD6 (match_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE MatchTeam ADD CONSTRAINT FK_AF0633A62ABEACD6 FOREIGN KEY (match_id) REFERENCES club_ranking_match(id)");
        $this->addSql("DROP TABLE club_ranking_match_team");
    }
}
