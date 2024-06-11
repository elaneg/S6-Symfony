<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{
/**
* @Route("/history", name="history")
*/
    public function index(): Response
    {
// Your logic to show history
        return $this->render('history/index.html.twig');
    }
}
