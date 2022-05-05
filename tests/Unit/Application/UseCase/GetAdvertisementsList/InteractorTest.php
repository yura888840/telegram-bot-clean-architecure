<?php
declare(strict_types=1);

namespace App\Tests\Unit\Application\UseCase\GetAdvertisementsList;

use App\Application\Domain\FlatAdvertisement;
use App\Application\UseCase\GetAdvertisementsList\AdvertisementsListRequestParameters;
use App\Application\UseCase\GetAdvertisementsList\AdvertisementsListResult;
use App\Application\UseCase\GetAdvertisementsList\AdvertisementsProviderInterface;
use App\Application\UseCase\GetAdvertisementsList\Interactor;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\PhpUnit\ProphecyTrait;

class InteractorTest extends TestCase
{
    use ProphecyTrait;

    private Interactor $interactor;

    /** @var AdvertisementsProviderInterface|ObjectProphecy  */
    private $adsFetcher;

    protected function setUp(): void
    {
        $result = new AdvertisementsListResult();
        $this->adsFetcher = $this->prophesize(AdvertisementsProviderInterface::class);
        $this->adsFetcher->fetchActiveAdvertisements(Argument::any())->willReturn($result);

        $this->interactor = new Interactor($this->adsFetcher->reveal());

        parent::setUp();
    }

    public function testGetListShouldReturnCorrectResult(): void
    {
        $parameters = $this->prophesize(AdvertisementsListRequestParameters::class);
        $parameters->getLand()->willReturn('');

        $result = $this->interactor->getAdvertisementsList($parameters->reveal());

        self::assertInstanceOf(AdvertisementsListResult::class, $result);
    }

    public function testResultShouldBeEmptyAdvertisementList(): void
    {
        $parameters = new AdvertisementsListRequestParameters('Berlin');

        $result = $this->interactor->getAdvertisementsList($parameters);

        $ads = $result->getAdvertisements();

        self::assertEquals([], $ads);
    }

    public function testResultFetchedAndShouldContainListOfAdvertisements(): void
    {
        $adsCollection = [
            new FlatAdvertisement(),
            new FlatAdvertisement(),
        ];
        $result = new AdvertisementsListResult($adsCollection);

        $this->adsFetcher->fetchActiveAdvertisements(Argument::any())->willReturn($result);

        $parameters = new AdvertisementsListRequestParameters('Berlin');

        $ads = $this->interactor->getAdvertisementsList($parameters)->getAdvertisements();

        self::assertNotEmpty($ads);

        foreach ($ads as $ad) {
            self::assertInstanceOf(FlatAdvertisement::class, $ad);
        }
    }
}
