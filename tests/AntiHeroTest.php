<?php

namespace User\Tp1PhpUnit;

use PHPUnit\Framework\TestCase;

class AntiHeroTest extends TestCase
{
    public function testAntiHeroInfligeDegatsAugmentes(): void
    {
        $antiHero = new AntiHero("Deadpool", 100, 50);
        $villain = new Personnage("Villain", 100, 30);

        $antiHero->attaquer($villain);

        $this->assertEquals(25, $villain->hp); // 100 - (50 * 1.5)
    }

    public function testAntiHeroSubit10PourcentDegatsSupplementaires(): void
    {
        $antiHero = new AntiHero("Deadpool", 100, 50);
        $villain = new Personnage("Vilain", 100, 40);

        $villain->attaquer($antiHero);

        $this->assertEquals(56, $antiHero->hp); // 100 - (40 * 1.1)
    }

    public function testAntiHeroNePeutPasAttaquerQuandKO(): void
    {
        $antiHero = new AntiHero("Deadpool", 0, 30);
        $personnage = new Personnage("Random", 100, 20);

        $antiHero->attaquer($personnage);

        $this->assertEquals(100, $personnage->hp); // Aucun dégât
    }
}
