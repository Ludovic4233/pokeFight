<?php

class Pokemon {
    private $nom;
    private $pv;
    private $pvmax;
    private $pc;
    private $type;

    public function __construct($n, $pv, $pvmax, $pc, $type){
        $this->nom = $n;
        $this->pv = $pv;
        $this->pvmax = $pvmax;
        $this->pc = $pc;
        $this->type = $type;
    }

    // Getter pour la propriété nom
    public function getNom() {
        return $this->nom;
    }

    // Getter pour la propriété pv
    public function getPv() {
        return $this->pv;
    }

    // Getter pour la propriété pvmax
    public function getPvmax() {
        return $this->pvmax;
    }

    // Getter pour la propriété pc
    public function getPc() {
        return $this->pc;
    }

    // Getter pour la propriété type
    public function getType() {
        return $this->type;
    }

    // Setter pour la propriété pv
    public function setPv($nouveauPv) {
        $this->pv = $nouveauPv;
    }

    public function estVivant(){
        if($this->pv > 0){
            return true;
        }else{
            return false;
        }
    }


    public function addPv(){
        if($this->pv < 20){
            $this->pv += 5;
        }
    }

    

}