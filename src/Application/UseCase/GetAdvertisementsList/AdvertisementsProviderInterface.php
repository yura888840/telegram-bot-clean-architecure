<?php

namespace App\Application\UseCase\GetAdvertisementsList;

interface AdvertisementsProviderInterface
{
    public function fetchActiveAdvertisements($land): AdvertisementsListResult;
}
