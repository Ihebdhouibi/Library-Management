<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Book;
use App\Repository\BookRepository;
use App\Entity\Emprunter;
use App\Entity\EmprunterRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

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
    public function signup(Request $request, EntityManagerInterface $manager){
        $user = new Emprunter();
        
        $form = $this->createFormBuilder($user)
                     ->add('email')
                     ->add('password')
                     ->add('role', )
                     ->add('name')
                     ->getForm();

        return $this->render('library/signup.html.twig', [
            'formEmprunter' => $form->createView()
        ]);
    }
}
