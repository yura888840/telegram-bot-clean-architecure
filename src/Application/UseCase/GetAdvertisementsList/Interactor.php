<?php
declare(strict_types=1);

namespace App\Application\UseCase\GetAdvertisementsList;

class Interactor
{
    private AdvertisementsProviderInterface $advertisementsProvider;

    public function __construct(
        AdvertisementsProviderInterface $advertisementsProvider
    ) {
        $this->advertisementsProvider = $advertisementsProvider;
    }

    public function getAdvertisementsList(AdvertisementsListRequestParameters $requestParameters): ?AdvertisementsListResult
    {
        try {
            $result = $this->advertisementsProvider->fetchActiveAdvertisements($requestParameters->getLand());
        } catch (\Throwable $exception) {
            return null;
        }

        return $result;
    }
}

