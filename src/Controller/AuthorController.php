<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author/{name}', name: 'author_show')]
    public function showAuthor(string $name): Response
    {
        return $this->render('show.html.twig', [
            'name' => $name,
        ]);
    }
    #[Route('/authors', name: 'author_list')]
    public function listAuthors(): Response
    {
        $authors = array( 
            array('id' => 1, 'picture' => '/images/Victor_Hugo.jpg','username' => 'Victor Hugo', 'email' =>'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william_shakespeare.jpg','username' => 'William Shakespeare', 'email' =>'william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>'taha.hussein@gmail.com', 'nb_books' => 300),
        );
        return $this->render('list.html.twig', ['authors' => $authors]);
    }

    #[Route('/author/details/{id}', name: 'author_details')]
    public function authorDetails(int $id): Response
    {
        $authors = [
            1 => ['id'=>1,'picture'=>'/images/Victor_Hugo.jpg','username'=>'Victor Hugo','email'=>'victor.hugo@gmail.com','nb_books'=>100],
            2 => ['id'=>2,'picture'=>'/images/william_shakespeare.jpg','username'=>'William Shakespeare','email'=>'william.shakespeare@gmail.com','nb_books'=>200],
            3 => ['id'=>3,'picture'=>'/images/Taha_Hussein.jpg','username'=>'Taha Hussein','email'=>'taha.hussein@gmail.com','nb_books'=>300],
        ];

        $author = $authors[$id] ?? null;

        if (!$author) {
            throw $this->createNotFoundException("Auteur introuvable ");
        }

        return $this->render('showAuthor.html.twig', [
            'author' => $author
        ]);
    }



}
