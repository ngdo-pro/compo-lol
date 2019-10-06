<?php declare(strict_types=1);

namespace App\Tests\Administration\Domain\Event;

use App\Administration\Domain\Event\ChampionRegistered;
use App\Administration\Domain\ValueObject\ChampionId;
use App\Administration\Domain\ValueObject\ChampionIdentity;
use App\Administration\Domain\ValueObject\ChampionImageUrl;
use App\Administration\Domain\ValueObject\ChampionName;
use App\Administration\Domain\ValueObject\VersionNumber;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class ChampionRegisteredTest extends TestCase
{
    public function test it can be initialized(): void
    {
        $championIdentity = new ChampionIdentity(Uuid::uuid4());
        $championId = new ChampionId('Fakename');
        $verionNumber = new VersionNumber('1.0.0');
        $championName = new ChampionName('Fakename');
        $championImageUrl = new ChampionImageUrl('fake-image-url');

        $event = new ChampionRegistered($championIdentity, $championId, $verionNumber, $championName, $championImageUrl);

        $this->assertSame($championId, $event->championId());
        $this->assertSame($verionNumber, $event->versionNumber());
        $this->assertSame($championName, $event->championName());
        $this->assertSame($championImageUrl, $event->championImageUrl());
    }
}
