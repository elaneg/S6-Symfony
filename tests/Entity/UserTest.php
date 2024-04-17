<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetterAndSetter()
    {
        // Création d'une instance de l'entité User
        $user = new User();

        // Définition de données de test
        $email = 'test@test.com';
        //[.. ICI VOS AUTRES SETTERS ..]

        // Utilisation des setters
        $user->setEmail($email);

        // Vérification des getters
        $this->assertEquals($email, $user->getEmail());
       // [.. ETC ..]
    }
}
