<?php
//on affiche tout ce qui est passé dans l'url (avec le rewriting...)
//var_dump($_GET);
//echo "<br><br>";


// on récupère les infos de l'url en séparant chaque composant:
//le controller, sa méthode et ses paramètres

$params = explode('/', $_GET['p']); //explode comme le split en javascript. $_GET['p'] p est le p après ? 
                                    //dans: index.php?p=/tuti/toto. définit ds .htaccess (peut importe l'url que je tape) 
                                    //index.php?p= passe dans l'url puis ce que j'ai taper
// var_dump($params);
// echo "<br>";

//router à revoir avec un switch par ex
if ($params[0]) {
    $controller = $params[0];
} else {
    $controller = 'Home';
}
if (@$params[1]) {
    $method = $params[1];
} else {
    $method = 'Index';
}
if (@$params[2]) {
    $req = $params[2];
} else {
    $req = '';
}
$called = 'controllers/'.$controller.'.php';
require($called);
if (method_exists($controller, $method)) {
    $myctrl = new $controller();
    $myctrl->$method($req);
} else {
    echo 'Method ' . $controller . '::' . $method . '() does not exist';
}


