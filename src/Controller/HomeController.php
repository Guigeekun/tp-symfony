<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{

    private $articleRepository;
    private $articles;
    private $name;

    /**
     * @Route("/hello/{name}", name="hello_name")
     */
    public function helloName( Request $request)
    {
        return new Response('Hello ' . $request->get('name'));
        $this->name = $request->get('name');
    }

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->articles = $this->articleRepository->findLast(4);
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'articles' => $this->articles
        ]);

    }
}
