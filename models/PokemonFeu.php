<?php

//require_once('Pokemon.php');

class PokemonFeu extends Pokemon {
    public function __construct($nom, $pv, $pvmax, $pc) {
        // Appel du constructeur de la classe parente (Pokemon)
        parent::__construct($nom, $pv, $pvmax, $pc, "feu");
    }

    public function attaque(Pokemon $pokemon){
        if($pokemon->getType() == "plante"){
            $attaque = $this->getPc()*2;
            $degats = $pokemon->getPv() - $attaque;
            $pokemon->setPv($degats);
        }else if($pokemon->getType() == "electrik"){
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