<?php

namespace App\Entity;

class VitesseMax
{
    const low = 100;
    const fast = 350;

    public function getVitesseMax()
    {
        return [
            self::low,
            self::fast
        ];
    }
}
