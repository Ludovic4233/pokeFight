<?php

//require_once('Pokemon.php');

class PokemonElectrik extends Pokemon {
    public function __construct($nom, $pv, $pvmax, $pc) {
        // Appel du constructeur de la classe parente (Pokemon)
        parent::__construct($nom, $pv, $pvmax, $pc, "electrik");
    }

    public function attaque(Pokemon $pokemon){
        if($pokemon->getType() == "eau"){
            $attaque = $this->getPc()*2;
            $degats = $pokemon->getPv() - $attaque;
            $pokemon->setPv($degats);
        }else if($pokemon->getType() == "feu"){
            $attaque = $this->getPc();
            $degats = $pokemon->getPv() - $attaque;
            $pokemon->setPv($degats);
        }else{
            $attaque = $this->getPc()*0.5;
            $degats = $pokemon->getPv() - $attaque;
            $pokemon->setPv($degats);
        }
    }
}