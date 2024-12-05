<?php

namespace User\Tp1PhpUnit;

class AntiHero extends Personnage
{
    // Constructeur
    public function __construct($nom, $hp, $atk)
    {
        parent::__construct($nom, $hp, $atk);
    }

    // Méthode attaquer() : inflige des dégâts augmentés de 50% pour un anti-héros
    public function attaquer($p)
    {
        $degats = (int) (1.5 * $this->atk);
        if (!$this->estKO()) {
            $p->recevoirDegats($degats);
        }
    }

    // Méthode recevoirDegats() : subit 10% de dégâts en plus
    public function recevoirDegats($degats)
    {
        $degatsAvecMalus = (int) ($degats * 1.1);
        parent::recevoirDegats($degatsAvecMalus);
    }
}
