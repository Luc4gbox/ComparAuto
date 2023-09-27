<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
#[ApiResource]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $reponse = [];

    #[ORM\Column]
    private ?int $ok = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getReponse(): array
    {
        return $this->reponse;
    }

    public function setReponse(array $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }



    public function getOk(): ?int
    {
        return $this->ok;
    }

    public function setOk(int $ok): self
    {
        $this->ok = $ok;

        return $this;
    }
}
