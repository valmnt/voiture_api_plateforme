<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Dto\VoitureOutput;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *  output=VoitureOutput::class,
 *  normalizationContext={
 *      "groups"="voiture_read"
 * }
 * )
 * @ApiFilter(SearchFilter::class, properties={"name"="ipartial"})
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture extends Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"color_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"color_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $vitesse_max;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Color", inversedBy="voitures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $color;

    public function __construct()
    {
        $this->color = new ArrayCollection();
    }

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

    public function getVitesseMax(): ?string
    {
        return $this->vitesse_max;
    }

    public function setVitesseMax(string $vitesse_max): self
    {
        $this->vitesse_max = $vitesse_max;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }
}
