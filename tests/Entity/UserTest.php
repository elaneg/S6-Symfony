<?php

namespace App\Tests\Entity;

use App\Entity\Subscription;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetterAndSetterUser()
    {
        // Création d'une instance de l'entité User
        $user = new User();

        // Définition de données de test
        $email = 'test@test.com';
        $firstname = 'firstname';
        $lastname = 'lastname';
        $password = 'password';
        $role = 'role';
        $sub_id = new Subscription();

        // Utilisation des setters
        $user->setEmail($email)
            ->setFirstname($firstname)
            ->setLastname($lastname)
            ->setPassword($password)
            ->setRole($role)
            ->setSubscriptionId($sub_id);

        // Vérification des getters
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($firstname, $user->getFirstname());
        $this->assertEquals($lastname, $user->getLastname());
        $this->assertEquals($password, $user->getPassword());
        $this->assertEquals($role, $user->getRole());
        $this->assertEquals($sub_id, $user->getSubscriptionId());
    }
}
