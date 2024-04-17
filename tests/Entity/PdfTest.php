<?php

namespace App\Tests\Entity;

use App\Entity\Pdf;
use App\Entity\Subscription;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PdfTest extends TestCase
{
    public function testGetterAndSetterPdf()
    {
        // Création d'une instance de l'entité User
        $pdf = new Pdf();
        $user = new User();

        // Définition de données de test
        $title = 'Title';
        $user_id = $user;
        $created_at = $user;

        // Utilisation des setters
        $pdf->setTitle($title)
            ->setUserId($user_id)
            ->setCreatedAt($created_at);

        // Vérification des getters
        $this->assertEquals($title, $pdf->getTitle());
        $this->assertEquals($user_id, $pdf->getUserId());
        $this->assertEquals($created_at, $pdf->getCreatedAt());
    }
}
