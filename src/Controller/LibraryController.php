<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Repository\BookRepository;
class LibraryController extends AbstractController
{
    #[Route('/library', name: 'app_library')]
    public function index(BookRepository $repo): Response
    {
        $books = $repo->findAll();
        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
            'books' => $books
        ]);
    }

    #[Route('/library/{id}', name: 'show_book')]
    public function show(Book $book){
        
        return $this->render('library/show.html.twig', 
        [
            'book' => $book
        ]);
    }

    #[Route('/', name: 'home')]
    public function home() {
        return $this->render('library/home.html.twig');
    }

    #[Route('/signup', name:'signup')]
    public function signup(){
        return $this->render('library/signup.html.twig');
    }
}
