<?php

namespace User\Tp1PhpUnit;

use PHPUnit\Framework\TestCase;

class SuperHeroTest extends TestCase // Corrigez ici
{
    public function testSuperHeroInflige80PourcentDegatsAUnVilain(): void
    {
        $superhero = new SuperHero("Superman", 100, 50);
        $villain = new Vilain("Lex Luthor", 100, 30);

        $superhero->attaqueVilain($villain);

        $this->assertEquals(60, $villain->hp); // 100 - (50 * 0.8)
    }

    public function testSuperHeroInfligeDegatsNormauxAutresPersonnages(): void
    {
        $superhero = new SuperHero("Superman", 100, 50);
        $personnage = new Personnage("Random", 100, 30);

        $superhero->attaqueAutre($personnage);

        $this->assertEquals(50, $personnage->hp); // 100 - 50
    }

    public function testSuperHeroNePeutPasAttaquerQuandKO(): void
    {
        $superhero = new SuperHero("Superman", 0, 50);
        $villain = new Vilain("Lex Luthor", 100, 30);

        $superhero->attaquer($villain);

        $this->assertEquals(100, $villain->hp); // Aucun dégât
    }
}


