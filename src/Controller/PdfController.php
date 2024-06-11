<?php

namespace App\Controller;

use App\Service\CallGotenbergService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PdfController extends AbstractController
{
    private CallGotenbergService $gotenbergService;

    public function __construct(CallGotenbergService $gotenbergService)
    {
        $this->gotenbergService = $gotenbergService;
    }

    /**
     * @Route("/generate-pdf", name="generate_pdf")
     */
    public function generatePdf(): Response
    {
        // contenu HTML à convertir en PDF
        $htmlContent = '<h1>PDF</h1><p>Générer un pdf.</p>';

        try {
            $pdfContent = $this->gotenbergService->generatePdf($htmlContent);

            return new Response($pdfContent, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="document.pdf"',
            ]);
        } catch (\Exception $e) {
            return new Response('Error generating PDF: ' . $e->getMessage(), 500);
        }
    }
}
