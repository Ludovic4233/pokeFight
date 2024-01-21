<?php

abstract class Controller {

    protected $vars = array();

    public function set($data) {
        $this->vars = array_merge($this->vars, $data);
    }

    public function render($filename) {
        extract($this->vars);// transforme vars en une serie de variables. extract transforme en variable les clées du tableau indexé
        require(ROOT.'views/'.$filename.'.php');//depuis la racine vas chercher dans views le fichier
    }

}