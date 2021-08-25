<?php

namespace App\Controller;

use App\Entity\Candy;
use App\Entity\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\BrowserKit\AbstractBrowser;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index() {
        return $this->render(
            "main/index.html.twig"
        );
    }
}