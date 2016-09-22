<?php


	$this->layout('layout');
	 

	$this->start('main_content');
	$fmsg->display(); 
?>



   		<form class="login-form" method="POST" action="<?= $this->url('user_login')?>"> 
            <label for="login">Login</label> 
            <input placeholder="Choisissez un Login" type="text" name="email">

            <label for="login">Mot de passe</label> 
            <input placeholder="Choisissez un mot de passe" type="text" name="mdp">
 
            <input type="submit" value="Se connecter">   
        </form>

<?php $this->stop('main_content');  ?>
