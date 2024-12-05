<?php

namespace User\Tp1PhpUnit;

class Vilain extends Personnage
{
    // Constructeur
    public function __construct($nom, $hp, $atk)
    {
        parent::__construct($nom, $hp, $atk);
    }

    // Méthode attaquer()
    public function attaquer($p)
    {
        if (!$this->estKO()) {
            $p->recevoirDegats($this->atk);
        }
    }

    // Méthode attaqueSuper() : inflige 20% de dégâts supplémentaires aux héros
  public function attaqueSuper($hero)
{
    if (!$this->estKO() && $hero instanceof SuperHero) {
        $degats = round($this->atk * 1.2); // Utilisation de round() pour éviter les problèmes d'arrondi
        $hero->recevoirDegats($degats);
    }
}
}
