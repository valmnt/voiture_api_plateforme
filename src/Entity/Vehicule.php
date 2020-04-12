<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

class Vehicule
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated;

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }
}
