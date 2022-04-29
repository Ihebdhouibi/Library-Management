<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429005223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating Database version 1 ';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothecaire (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrow_book (id INT AUTO_INCREMENT NOT NULL, borrow_date DATETIME NOT NULL, action VARCHAR(255) NOT NULL, approved TINYINT(1) NOT NULL, delete_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrow_book_emprunter (borrow_book_id INT NOT NULL, emprunter_id INT NOT NULL, INDEX IDX_D56BAA494852B505 (borrow_book_id), INDEX IDX_D56BAA49DE160310 (emprunter_id), PRIMARY KEY(borrow_book_id, emprunter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrow_book_book (borrow_book_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_64F44EB34852B505 (borrow_book_id), INDEX IDX_64F44EB316A2B381 (book_id), PRIMARY KEY(borrow_book_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copy (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_4DBABB8216A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, books_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE library_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE borrow_book_emprunter ADD CONSTRAINT FK_D56BAA494852B505 FOREIGN KEY (borrow_book_id) REFERENCES borrow_book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE borrow_book_emprunter ADD CONSTRAINT FK_D56BAA49DE160310 FOREIGN KEY (emprunter_id) REFERENCES emprunter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE borrow_book_book ADD CONSTRAINT FK_64F44EB34852B505 FOREIGN KEY (borrow_book_id) REFERENCES borrow_book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE borrow_book_book ADD CONSTRAINT FK_64F44EB316A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE copy ADD CONSTRAINT FK_4DBABB8216A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrow_book_book DROP FOREIGN KEY FK_64F44EB316A2B381');
        $this->addSql('ALTER TABLE copy DROP FOREIGN KEY FK_4DBABB8216A2B381');
        $this->addSql('ALTER TABLE borrow_book_emprunter DROP FOREIGN KEY FK_D56BAA494852B505');
        $this->addSql('ALTER TABLE borrow_book_book DROP FOREIGN KEY FK_64F44EB34852B505');
        $this->addSql('ALTER TABLE borrow_book_emprunter DROP FOREIGN KEY FK_D56BAA49DE160310');
        $this->addSql('DROP TABLE bibliothecaire');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE borrow_book');
        $this->addSql('DROP TABLE borrow_book_emprunter');
        $this->addSql('DROP TABLE borrow_book_book');
        $this->addSql('DROP TABLE copy');
        $this->addSql('DROP TABLE emprunter');
        $this->addSql('DROP TABLE library_user');
    }
}
