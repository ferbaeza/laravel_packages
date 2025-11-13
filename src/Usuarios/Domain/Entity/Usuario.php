<?php

namespace Devpack\Usuarios\Domain\Entity;

use Baezeta\Kernel\Entity\BaseKernelEntity;
use Baezeta\Kernel\ValueObjects\Fecha\FechaValue;

class Usuario extends BaseKernelEntity
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private ?FechaValue $emailVerifiedAt = null
    ) {
    }

    public function toArray(): array
    {
        return $this->getAttributes();
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

    public function getEmailVerifiedAt(): ?\DateTimeInterface
    {
        return $this->emailVerifiedAt;
    }

    public function isEmailVerified(): bool
    {
        return $this->emailVerifiedAt !== null;
    }
}