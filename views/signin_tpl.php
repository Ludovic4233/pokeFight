<?php
include('header_tpl.php');
?>

<form method="POST" action="Signin/record">    
    <input type="text" name="pseudo" placeholder="Pseudo">    
    <input type="text" name="firstname" placeholder="Firstname">    
    <input type="text" name="lastname" placeholder="Lastname">    
    <input type="password" name="password" placeholder="Password">  
    <button type="submit">Sign In</button>
</form>

<p>
    <a href="/"> Page d'accueil</a>
</p>

<?php
include('footer_tpl.php');
?>