<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;

final class VoitureOutput
{
    /**
     * @Groups("voiture_read")
     */
    public $id;

    /**
     * @Groups("voiture_read")
     */
    public $name;

    /**
     * @Groups("voiture_read")
     */
    public $update;
}
