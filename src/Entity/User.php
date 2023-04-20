<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoles(): array
    {
        // Return an array of user roles, e.g. ['ROLE_USER']
        return ['ROLE_USER'];
    }

    public function getUserIdentifier(): string
    {
        // Return the user identifier, e.g. the email or username
        return (string) $this->email;
    }

    public function getSalt()
    {
        // This method is not needed with the bcrypt algorithm
        // but is required by the UserInterface
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function eraseCredentials()
    {
        // This method is called after authentication to remove
        // sensitive data from the object
    }

    public function setPassword(string $password, UserPasswordHasherInterface $passwordHasher): self
    {
        $hashedPassword = $passwordHasher->hashPassword($this, $password);
        $this->password = $hashedPassword;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
