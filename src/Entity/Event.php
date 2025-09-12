<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTime $eventDateStart = null;

    #[ORM\Column]
    private ?\DateTime $eventDateEnd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEventDateStart(): ?\DateTime
    {
        return $this->eventDateStart;
    }

    public function setEventDateStart(\DateTime $eventDateStart): static
    {
        $this->eventDateStart = $eventDateStart;

        return $this;
    }

    public function getEventDateEnd(): ?\DateTime
    {
        return $this->eventDateEnd;
    }

    public function setEventDateEnd(\DateTime $eventDateEnd): static
    {
        $this->eventDateEnd = $eventDateEnd;

        return $this;
    }
}
