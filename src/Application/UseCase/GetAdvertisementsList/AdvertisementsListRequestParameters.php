<?php
declare(strict_types=1);

namespace App\Application\UseCase\GetAdvertisementsList;

class AdvertisementsListRequestParameters
{
    private string $land;

    public function __construct(
        string $land
    ) {
        $this->land = $land;
    }

    public function getLand(): string
    {
        return $this->land;
    }
}
