<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;

class BooksFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for($i=0; $i < 10; $i++){
            $book = new Book();
            $book->setTitle("Book title n $i");
            $book->setAuthor("Book author $i");
            $book->setContent("Book content $i");
            $book->setStatus("disponible");
            $manager->persist($book);
        }

        $manager->flush();
    }
}
