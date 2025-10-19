<?php

namespace Devpack\src\Usuarios\Domain\Entity;

class Usuario
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private string $password,
        private ?\DateTimeInterface $emailVerifiedAt = null
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmailVerifiedAt(): ?\DateTimeInterface
    {
        return $this->emailVerifiedAt;
    }

    public function isEmailVerified(): bool
    {
        return $this->emailVerifiedAt !== null;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}