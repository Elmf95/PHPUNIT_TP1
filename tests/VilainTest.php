<?php

namespace User\Tp1PhpUnit;

use PHPUnit\Framework\TestCase;

class VilainTest extends TestCase
{
public function testVillainInfligeDegatsAugmentesAuxSuperHeros(): void
{
    $vilain = new Vilain("Joker", 100, 50);
    $superhero = new SuperHero("Superman", 100, 30);

    $this->assertEquals(100, $superhero->hp, "Le SuperHero devrait avoir 100 HP au départ.");

    $vilain->attaqueSuper($superhero);

    $expectedHp = 100 - (50 * 1.2); // 60
    $this->assertEquals($expectedHp, $superhero->hp, "Les HP devraient être réduits correctement après l'attaque.");
}


    public function testVillainInfligeDegatsNormauxAutresPersonnages(): void
    {
        $villain = new Vilain("Joker", 100, 50);
        $personnage = new Personnage("Random", 100, 30);

        $villain->attaquer($personnage);

        $this->assertEquals(50, $personnage->hp); // 100 - 50
    }

    public function testVillainNePeutPasAttaquerQuandKO(): void
    {
        $villain = new Vilain("Joker", 0, 40);
        $superhero = new SuperHero("Superman", 100, 50);

        $villain->attaquer($superhero);

        $this->assertEquals(100, $superhero->hp); // Aucun dégât
    }
}

