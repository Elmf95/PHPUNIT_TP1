<?php

namespace User\Tp1PhpUnit;

use PHPUnit\Framework\TestCase;
use User\Tp1PhpUnit\SuperHero;
use User\Tp1PhpUnit\Vilain;
use User\Tp1PhpUnit\AntiHero;
use User\Tp1PhpUnit\Personnage;

class CombatTest extends TestCase
{
    public function testSuperHeroKOBeforeAttack(): void
    {
        $superhero = new SuperHero("Batman", 0, 50);
        $villain = new Vilain("Lex Luthor", 100, 30);

        $superhero->attaquer($villain);
        
        
        $this->assertEquals(100, $villain->hp); 
    }

    public function testVillainKOBeforeAttack(): void
    {
        $villain = new Vilain("Joker", 0, 40);
        $superhero = new SuperHero("Superman", 100, 50);

        $villain->attaquer($superhero);
        
        
        $this->assertEquals(100, $superhero->hp); 
    }

    public function testAntiHeroKOBeforeAttack(): void
    {
        $antihero = new AntiHero("Deadpool", 0, 30);
        $personnage = new Personnage("Random", 100, 20);

        $antihero->attaquer($personnage);
        
        
        $this->assertEquals(100, $personnage->hp); 
    }


}
