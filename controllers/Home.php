<?php

class Home extends Controller {

    public function index() {
        $existingPokemon = new PokemonDao;
        //var_dump($existingPokemon);
        $existingPokemon->getAllPokemons();
        $this->render('home_tpl');
    }
}