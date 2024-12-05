<?php

namespace User\Tp1PhpUnit;

use PHPUnit\Framework\TestCase;
use User\Tp1PhpUnit\Personnage;

class PersonnageTest extends TestCase
{
    public function testPersonnageEstKORetourneFalseQuandHPPositif(): void
    {
        $personnage = new Personnage("Hero", 100, 20);
        $this->assertFalse($personnage->estKO());
    }

    public function testPersonnageEstKORetourneTrueQuandHPZero(): void
    {
        $personnage = new Personnage("Hero", 0, 20);
        $this->assertTrue($personnage->estKO());
    }

    public function testPersonnageEstKORetourneTrueQuandHPNegatif(): void
    {
        $personnage = new Personnage("Hero", -10, 20);
        $this->assertTrue($personnage->estKO());
    }

    public function testAttaquerReduitLesHPDeLAdversaire(): void
    {
        $attaquant = new Personnage("Attaquant", 100, 10);
        $defenseur = new Personnage("Défenseur", 50, 5);

        $attaquant->attaquer($defenseur);

        $this->assertEquals(40, $defenseur->hp);
    }

    public function testAttaquerNeModifiePasHPQuandAttaquantKO(): void
    {
        $attaquant = new Personnage("Attaquant", 0, 10);
        $defenseur = new Personnage("Défenseur", 50, 5);

        $attaquant->attaquer($defenseur);

        
        $this->assertEquals(50, $defenseur->hp);
    }

    public function testRecevoirDegatsNeFaitPasDescendreHPEnDessousDeZero(): void
    {
        $personnage = new Personnage("Défenseur", 10, 5);

        $personnage->recevoirDegats(15);

        
        $this->assertEquals(-5, $personnage->hp);
    }

    public function testToStringAfficheLesInformationsCorrectes(): void
    {
        $personnage = new Personnage("Hero", 100, 20);

        $expected = "Nom: Hero, HP: 100, Attaque: 20";
        $this->assertEquals($expected, (string) $personnage);
    }

    public function testAttaqueAvecZeroDommageNeChangePasLesHP(): void
    {
        $attaquant = new Personnage("Attaquant", 100, 0);
        $defenseur = new Personnage("Défenseur", 50, 5);

        $attaquant->attaquer($defenseur);

        
        $this->assertEquals(50, $defenseur->hp);
    }
}
