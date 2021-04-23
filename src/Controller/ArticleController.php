<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class ArticleController extends AbstractController
{

    private $articleRepository;
    private $id;
    private $article;

    public function __construct(ArticleRepository $articleRepository )
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @Route("/article/{id}", name="show")
     */
    public function show(Article $article)
    {

        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
