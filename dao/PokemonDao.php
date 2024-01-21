<?php
require_once('database.php');

class PokemonDao {

    private $db_connect;

    public function getAllPokemons() {

        $this->db_connect = connectToDB();

        $sth = $this->db_connect->prepare("SELECT id_pokemon, nom, pv, pvmax, pc, type FROM `pokemon`");

        try{
            $sth->execute();

            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";
            // var_dump($result);
            // echo "<pre>";
            // var_dump($result[1]['nom']);
            if ($result != FALSE){
                $pokemons = array();
                for($i=0; $i<count($result); $i++){
                    array_push($pokemons, new Pokemon($result[$i]['nom'], $result[$i]['pv'], $result[$i]['pvmax'], $result[$i]['pc'], $result[$i]['type']));
                }
                // echo "<pre>";
                // var_dump($pokemons);
                $_SESSION['pokemons'] = serialize($pokemons);
                return TRUE;
            }
        }
        catch(PDOException $e){
            echo "Erreur: ". $e->getMessage();
        }
    }

    public function getPokemonByName($namePok){
        $this->db_connect = connectToDB();

        $sth = $this->db_connect->prepare("SELECT * FROM `pokemon` WHERE nom = '$namePok'");

        try{
            $sth->execute();

            $result = $sth->fetch(PDO::FETCH_ASSOC);
            //var_dump($result);

            function pokemonType($pokemontotype){
                if($pokemontotype->getType() == "eau"){
                    $pokemonChoosesType = new PokemonEau($pokemontotype->getNom(), $pokemontotype->getPv(), $pokemontotype->getPvmax(), $pokemontotype->getPc());
                }else if($pokemontotype->getType() == "feu"){
                    $pokemonChoosesType = new PokemonFeu($pokemontotype->getNom(), $pokemontotype->getPv(), $pokemontotype->getPvmax(), $pokemontotype->getPc());
                }else if($pokemontotype->getType() == "electrik"){
                    $pokemonChoosesType = new PokemonElectrik($pokemontotype->getNom(), $pokemontotype->getPv(), $pokemontotype->getPvmax(), $pokemontotype->getPc());
                }else{
                    $pokemonChoosesType = new PokemonPlante($pokemontotype->getNom(), $pokemontotype->getPv(), $pokemontotype->getPvmax(), $pokemontotype->getPc());
                }
                return $pokemonChoosesType;
            }

            if ($result != FALSE){
                    $pokemonChooses = new Pokemon($result['nom'], $result['pv'], $result['pvmax'], $result['pc'], $result['type']);

                    // echo"<pre>";
                    // var_dump($pokemonChooses);
                    
                    $tablePokemon = unserialize($_SESSION['pokemons']);
                    $tablePokemonToChoose = [];

                    // echo"<pre>";
                    // var_dump($tablePokemon[1]->getNom());

                    foreach($tablePokemon as $pokemon){
                        if($pokemon->getNom() != $pokemonChooses->getNom()){
                            array_push($tablePokemonToChoose, $pokemon);
                        }
                    }

                    // echo"<pre>";
                    // var_dump($tablePokemonToChoose);

                    $indexRand = array_rand($tablePokemonToChoose);
                    $adversary = $tablePokemonToChoose[$indexRand];

                    // echo"<pre>";
                    // var_dump($adversary);

                    $pokemonChoosesType = pokemonType($pokemonChooses);

                    // echo"<pre>";
                    // var_dump($pokemonChoosesType);

                    $adversaryType = pokemonType($adversary);

                    // echo"<pre>";
                    // var_dump($adversaryType);

                    $_SESSION['pokemonChoosesType'] = $pokemonChoosesType;
                    $_SESSION['adversaryType'] = $adversaryType;
                    $_SESSION['pokemonChooses'] = $pokemonChooses;
                    $_SESSION['adversary'] = $adversary;

                return TRUE;
            }
        }
        catch(PDOException $e){
            echo "Erreur: ". $e->getMessage();
        }
        
        // foreach($pokemonsTable as $elem){
        //     if($elem->getNom() == $_POST('namePokemon')){
        //         $_SESSION['pokemonChoose'] = serialize($elem);
        //     }
        //     echo "<pre>";
        //     var_dump($elem);
        // }
    }
}