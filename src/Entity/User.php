<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
<<<<<<< HEAD
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements \Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface
=======

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
>>>>>>> 3f64b0a5ab854a36e096bd1336cbc9c98405d1c2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\ManyToOne(inversedBy: 'subscriber')]
    private ?Subscription $subscription_id = null;

    /**
     * @var Collection<int, Pdf>
     */
    #[ORM\OneToMany(targetEntity: Pdf::class, mappedBy: 'owner')]
    private Collection $pdf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @return Collection<int, Pdf>
     */
    public function getPdf(): Collection
    {
        return $this->pdf;
    }

    public function addPdf(Pdf $pdf): static
    {
        if (!$this->pdf->contains($pdf)) {
            $this->pdf->add($pdf);
            $pdf->setUserId($this);
        }

        return $this;
    }
    public function removePdf(Pdf $pdf): static
    {
        if ($this->pdf->removeElement($pdf)) {
            // set the owning side to null (unless already changed)
            if ($pdf->getUserId() === $this) {
                $pdf->setUserId(null);
            }
        }
        return $this;
    }
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
