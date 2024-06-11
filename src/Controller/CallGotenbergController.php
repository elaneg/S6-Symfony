<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CallGotenbergController extends AbstractController
{
    #[Route('/call/gotenberg', name: 'app_call_gotenberg')]
    public function index(): Response
    {
        return $this->render('call_gotenberg/index.html.twig', [
            'controller_name' => 'CallGotenbergController',
        ]);
    }
}
