<?php
declare(strict_types=1);

namespace App\Tests\Unit\Application\UseCase\GetAdvertisementsList;

use App\Application\UseCase\GetAdvertisementsList\AdvertisementsListRequestParameters;
use App\Application\UseCase\GetAdvertisementsList\AdvertisementsListResult;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class InteractorTest extends TestCase
{
    use ProphecyTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGetListShouldReturnCorrectResult()
    {
        $interactor = new Interactor();

        $result = $interactor->getAdvertisementsList();
        self::assertInstanceOf(AdvertisementsListResult::class, $result);
    }
}



class Interactor
{
    public function getAdvertisementsList(AdvertisementsListRequestParameters $requestParameters)
    {
        return new AdvertisementsListResult();
    }
}
