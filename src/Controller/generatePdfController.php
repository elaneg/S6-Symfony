<?php

namespace App\Controller;

use App\Service\CallGotenbergService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class generatePdfController extends AbstractController
{
    private CallGotenbergService $pdfService;

    public function __construct(CallGotenbergService $pdfService)
    {
        $this->pdfService = $pdfService;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function generatePdf(Request $request): Response
    {
// Créer le formulaire
        $form = $this->createFormBuilder()
        ->add('url', null, ['required' => true])
        ->getForm();

// Gérer la soumission du formulaire
        $form->handleRequest($request);

// Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
    // Récupérer l'URL saisie à partir des données du formulaire
            $url = $form->getData()['url'];

    // Faites appel à votre service pour générer le PDF
            $pdf = $this->pdfService->generatePdf($url);

    // Rediriger ou afficher une réponse appropriée
    // Par exemple, rediriger vers une page de confirmation
            return $this->redirectToRoute('pdf_generated_success');
        }

// Afficher le formulaire
        return $this->render('pdf/generate_pdf.html.twig', [
        'form' => $form->createView(),
        ]);
    }
}
