<?php

class Signin extends Controller {

    public function index() {
        $this->render('signin_tpl');
    }

    public function record() {
        //echo "<pre>";
        //var_dump($_POST);
        //echo "<pre>";
        $newUser = new UserDao;
       //var_dump($newUser);
       if($newUser->verify($_POST)){
           if($newUser->insert($_POST)){
               $info['message'] = ['msg' => 'User bien créé'];
               $this->set($info);
               $this->render('dashboard_tpl');
               //header("Location: /");
               // echo "Compte crée avec succès !";
               // echo "<a href='/'> Accèder à votre Page</a>";
            }else{
                trigger_error('Erreur dans le formulaire',E_USER_WARNING);
                
                //echo "ya une couille";
            }
        }
        else{
            echo"Pseudo déjà existant";
        }
    }

}