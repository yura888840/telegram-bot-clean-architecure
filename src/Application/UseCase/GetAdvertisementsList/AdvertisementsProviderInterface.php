<?php

namespace App\Application\UseCase\GetAdvertisementsList;

use App\Application\Domain\AdvertisementsCollection;

interface AdvertisementsProviderInterface
{
    public function fetchActiveAdvertisements($land): AdvertisementsCollection;
}
