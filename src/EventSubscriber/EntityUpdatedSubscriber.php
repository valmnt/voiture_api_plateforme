<?php

namespace App\EventSubscriber;

use App\Entity\Vehicule;
use DateTime;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class EntityUpdatedSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::preUpdate
        ];
    }

    public function preUpdate(LifecycleEventArgs $lifecycleEventArgs)
    {
        $object = $lifecycleEventArgs->getObject();

        if ($object instanceof Vehicule) {
            $object->setUpdated(new DateTime());
        }
    }
}
