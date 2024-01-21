<?php
include('header_tpl.php');
//include('models/Pokemon.php');
?>


<h1>FIGHT</h1>

<h2><?php echo $message['msg'].$_SESSION['pseudo']." le combat va commencé !"; ?></h2>

<h3>Adversaire: <?php echo $_SESSION['adversaryType']->getNom() ?></h3>
<p>Le combat oppose <?= $_SESSION['pokemonChoosesType']->getNom() ?> et <?= $_SESSION['adversaryType']->getNom() ?></p>

<?php
    // echo "<pre>";
    // var_dump($_SESSION['adversary']->getPv());
    $potionAdversary = 0;
    $potionChoose = 0;

    do{  

    echo $_SESSION['pokemonChoosesType']->getNom()." attaque ". $_SESSION['adversaryType']->getNom()."\n";    
    $_SESSION['pokemonChoosesType']->attaque($_SESSION['adversary']);

    if($_SESSION['adversary']->estVivant()){
      echo $_SESSION['adversaryType']->getNom()." est vivant, il attaque ".$_SESSION['pokemonChoosesType']->getNom()."\n";
      $_SESSION['adversaryType']->attaque($_SESSION['pokemonChooses']);
    } 
    if($_SESSION['pokemonChooses']->estVivant()){
        echo $_SESSION['pokemonChoosesType']->getNom()." est vivant ! \n";
    } 

    echo $_SESSION['adversaryType']->getNom()." a ".$_SESSION['adversary']->getPv()." pv\n";
    echo $_SESSION['pokemonChoosesType']->getNom()." a ".$_SESSION['pokemonChooses']->getPv()." pv\n";

    if($_SESSION['adversary']->getPv() > 0 && $_SESSION['adversary']->getPv() < 10 && $potionAdversary == 0){
        echo $_SESSION['adversaryType']->getNom()." boit une potion de 5 pv\n";
        $_SESSION['adversary']->addPv();
        $potionAdversary += 1;
        echo $_SESSION['adversaryType']->getNom()." a maintenant ".$_SESSION['adversary']->getPv()." pv\n";
    }
    if($_SESSION['pokemonChooses']->getPv() > 0 && $_SESSION['pokemonChooses']->getPv() < 10 && $potionChoose == 0){
        echo $_SESSION['pokemonChoosesType']->getNom()." boit une potion de 5 pv\n";
        $_SESSION['pokemonChooses']->addPv();
        $potionChoose += 1;
        echo $_SESSION['pokemonChoosesType']->getNom()." a ".$_SESSION['pokemonChooses']->getPv()." pv\n";
    }
     flush();
     usleep(2000000);
    }while($_SESSION['adversary']->estVivant() == true && $_SESSION['pokemonChooses']->estVivant() == true);
    // echo "<pre>";
    // var_dump($_SESSION['adversary']->getPv());
    if($_SESSION['adversary']->estVivant()){ 
        echo $_SESSION['pokemonChoosesType']->getNom()." est mort, ".$_SESSION['adversaryType']->getNom()." à gagner !";
    }else{
    echo $_SESSION['adversaryType']->getNom()." est mort, ".$_SESSION['pokemonChoosesType']->getNom()." à gagner !";
    }
?>


<?php
include('footer_tpl.php');
?>