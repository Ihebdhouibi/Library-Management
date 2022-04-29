<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
class LibraryController extends AbstractController
{
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Book::class);
        $books = $repo->findAll();
        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
            'books' => $books
        ]);
    }

    #[Route('/library/{id}', name: 'show_book')]
    public function show($id){
        $repo = $this->getDoctrine()->getRepository(Book::class);
        $book = $repo->find($id);

        return $this->render('library/show.html.twig', 
        [
            'book' => $book
        ]);
    }

    #[Route('/', name: 'home')]
    public function home() {
        return $this->render('library/home.html.twig');
    }
}
