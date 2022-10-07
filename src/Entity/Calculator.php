<?php

namespace App\Entity;

use App\Repository\CalculatorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalculatorRepository::class)]
class Calculator
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $firstNum = null;

    #[ORM\Column]
    private ?int $SecondNum = null;

    #[ORM\Column(length: 255)]
    private ?string $operation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstNum(): ?int
    {
        return $this->firstNum;
    }

    public function setFirstNum(int $firstNum): self
    {
        $this->firstNum = $firstNum;

        return $this;
    }

    public function getSecondNum(): ?int
    {
        return $this->SecondNum;
    }

    public function setSecondNum(int $SecondNum): self
    {
        $this->SecondNum = $SecondNum;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }
}
