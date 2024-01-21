<?php
include('header_tpl.php');
?>
    <h2><?php if(isset($message['msg'])){
        echo $message['msg'] ;
    } ?></h2>
  
    <form method="POST" action="/Login/connexion">
        <input type="text" name="pseudo" placeholder="Pseudo" value="Ludo">
        <input type="password" name="password" placeholder="Password" value="Ng34@ci">

        
        <label for="pok-select">Choisissez un pokémon:</label>
        <select name="namePokemon" id="pok-select">
            <?php 
            
            $pokemons = unserialize($_SESSION['pokemons']);
            // echo "<pre>";
            // var_dump($pokemons);

            foreach($pokemons as $elem){ ?>
                <option value="<?= $elem->getNom() ?>"><?= $elem->getNom() ?></option>
                <?php }?>
        </select>
        
        <button>SOLO!</button>
     </form>
   


<a href="/Signin">SignIn</a>


<?php
include('footer_tpl.php');
?>