<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 * @ORM\Table(name="experience")
 * @ApiResource
 */
class Experience
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="name")
     */
    private $name;
    
    /**
     * @var date
     *
     * @ORM\Column(type="datetime", name="dateDebut", nullable=true)
     *
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    private $dateDebut;
    
    /**
     * @var date
     *
     * @ORM\Column(type="datetime", name="dateFin", nullable=true)
     *
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     */
    private $dateFin;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    
    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }
    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }
    
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
