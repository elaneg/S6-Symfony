<?php

namespace App\Controller;

use App\Repository\PdfRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{
    private $PdfRepository;

    public function __construct(PdfRepository $PdfRepository)
    {
        $this->PdfRepository = $PdfRepository;
    }
/**
* @Route("/history", name="history")
*/
    public function index(): Response
    {
        $historique = $this->PdfRepository->findAll();

        return $this->render('history/index.html.twig', [
            'generatedPdfs' => $historique,
        ]);
    }
}
