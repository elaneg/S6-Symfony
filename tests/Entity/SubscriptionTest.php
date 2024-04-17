<?php

namespace App\Tests\Entity;

use App\Entity\Subscription;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    public function testGetterAndSetterSubscription()
    {
        // Création d'une instance de l'entité User
        $sub = new Subscription();

        // Définition de données de test
        $title = 'Title';
        $description = 'description';
        $pdf_limit = 'limit';
        $price = '25';
        $media = 'media';

        // Utilisation des setters
        $sub->setTitle($title);
        $sub->setDescription($description);
        $sub->setPdfLimit($pdf_limit);
        $sub->setPrice($price);
        $sub->setMedia($media);

        // Vérification des getters
        $this->assertEquals($title, $sub->getTitle());
        $this->assertEquals($description, $sub->getDescription());
        $this->assertEquals($pdf_limit, $sub->getPdfLimit());
        $this->assertEquals($price, $sub->getPrice());
        $this->assertEquals($media, $sub->getMedia());
    }
}
