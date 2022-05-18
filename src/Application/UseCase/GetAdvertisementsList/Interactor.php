<?php
declare(strict_types=1);

namespace App\Application\UseCase\GetAdvertisementsList;

use App\Application\Domain\AdvertisementsCollection;

class Interactor
{
    private AdvertisementsProviderInterface $advertisementsProvider;

    public function __construct(
        AdvertisementsProviderInterface $advertisementsProvider
    ) {
        $this->advertisementsProvider = $advertisementsProvider;
    }

    public function getActiveAdvertisementsList(AdvertisementsListRequestParameters $requestParameters): AdvertisementsCollection
    {
        return $this->advertisementsProvider->fetchActiveAdvertisements($requestParameters->getLand());
    }
}

