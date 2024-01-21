<?php

class Login extends Controller {

    public function connexion(){
        //var_dump($_POST);
         $existingUser = new UserDao;
         $pokemonChoice = new PokemonDao;
         if($existingUser->connect($_POST)){
            $info['message'] = ['msg' => 'Vous êtes connecté bienvenu '];
            $this->set($info);
            //$pokemons = unserialize($_SESSION['pokemons']);
            // echo "<pre>";
            // var_dump($pokemons);
            $pokemonChoice->getPokemonByName($_POST['namePokemon']);
            $this->render('fight_tpl');
         }
          else{
            $info['message'] = ['msg' => 'pseudo et/ou mot de passe incorrect'];
            $this->set($info);
            $this->render('home_tpl');
              //trigger_error('Erreur dans le formulaire',E_USER_WARNING);
              //echo"pseudo et/ou mot de passe incorrect";
         }
     }
}