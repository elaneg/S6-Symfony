<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\History;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{
/**
* @Route("/history", name="history")
*/
    public function index(): Response
    {
        $historique = $this->getDoctrine()->getRepository(History::class)->findAll();

        return $this->render('history/index.html.twig', [
            'historique' => $historique,
        ]);
    }
}
