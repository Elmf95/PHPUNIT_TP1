<?php 

namespace User\Tp1PhpUnit;



class SuperHero extends Personnage {
    // Constructeur
    public function __construct($nom, $hp, $atk) {
        parent::__construct($nom, $hp, $atk);
    }

    // Méthode attaqueVilain : inflige 80% des dégâts aux vilains
    public function attaqueVilain($vilain) {
        if ($vilain instanceof Vilain && !$this->estKO()) {
            $degats = (int) (0.8 * $this->atk);
            $vilain->recevoirDegats($degats);
        }
    }

    // Méthode attaqueAutre pour attaquer normalement tous les autres personnages sauf les vilains
    public function attaqueAutre($p) {
        if (!$this->estKO() && !$p instanceof Vilain) {
            $degats = $this->atk; // Attaque normale sans réduction de dégâts
            $p->recevoirDegats($degats);
        }
    }
}