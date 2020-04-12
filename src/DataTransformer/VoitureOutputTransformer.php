<?php

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\VoitureOutput;
use App\Entity\Voiture;

final  class VoitureOutputTransformer implements DataTransformerInterface
{
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $data instanceof Voiture && $to === VoitureOutput::class;
    }

    public function transform($object, string $to, array $context = [])
    {
        if (!$object instanceof Voiture) {
            return;
        }

        $output = new VoitureOutput();
        $output->id = $object->getId();
        $output->name = $object->getName();
        $output->update = $object->getUpdated();

        return $output;
    }
}
