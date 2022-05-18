<?php
declare(strict_types=1);

namespace App\Tests\Unit\Application\UseCase\GetAdvertisementsList;

use App\Application\Domain\AdvertisementsCollection;
use App\Application\Domain\FlatAdvertisement;
use App\Application\UseCase\GetAdvertisementsList\AdvertisementsListRequestParameters;
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
        $result = new AdvertisementsCollection();
        $this->adsFetcher = $this->prophesize(AdvertisementsProviderInterface::class);
        $this->adsFetcher->fetchActiveAdvertisements(Argument::any())->willReturn($result);

        $this->interactor = new Interactor($this->adsFetcher->reveal());

        parent::setUp();
    }

    public function testGetListShouldReturnCorrectResult(): void
    {
        $parameters = new AdvertisementsListRequestParameters();

        $result = $this->interactor->getActiveAdvertisementsList($parameters);

        self::assertInstanceOf(AdvertisementsCollection::class, $result);
    }

    public function testResultShouldBeEmptyAdvertisementList(): void
    {
        $parameters = new AdvertisementsListRequestParameters('Berlin');

        $collection = $this->interactor->getActiveAdvertisementsList($parameters);

        self::assertEmpty($collection);
    }

    public function testShouldReturnForSpecifiedCityNonEmptyCollection(): void
    {

        $resultCollection = new AdvertisementsCollection();
        $resultCollection
            ->addAdvertisement(
                (new FlatAdvertisement())
                        ->setLand('Berlin')
            )
            ->addAdvertisement(
                (new FlatAdvertisement())
                    ->setLand('Berlin')
            );

        $this->adsFetcher->fetchActiveAdvertisements(Argument::exact('Berlin'))->willReturn($resultCollection);

        $parameters = new AdvertisementsListRequestParameters('Berlin');

        $ads = $this->interactor->getActiveAdvertisementsList($parameters);

        self::assertNotEmpty($ads);
        self::assertContainsOnlyInstancesOf(FlatAdvertisement::class, $resultCollection);
    }
}
