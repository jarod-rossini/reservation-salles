<?php
	session_start();
	ini_set('display_errors', 'off');
	$bdd = new mysqli('localhost', 'root', '', 'reservationsalles');
	
	if($bdd->connect_errno){
		echo 'Connexion échoué :'.$bdd->connect_errno.'|'.$bdd->connect_error;
	}
	
	$bdd->set_charset('utf8');
	
	echo $_SESSION['header'];
?>

<header>
	<nav>
		<ul>
			<li><a href="<?php echo $pathindex; ?>index.php">Accueil</a></li>
			<li class="liinscription"><a href="<?php echo $path; ?>inscription.php">Inscription</a></li>
			<li class="liconnexion"><a href="<?php echo $path; ?>connexion.php">Connexion</a></li>
			<li class="liprofil"><a href="<?php echo $path; ?>profil.php">Profil</a></li>
			<li class="liplanning"><a href="<?php echo $path; ?>planning.php">Planning</a></li>
			<li class="lireservation"><a href="<?php echo $path; ?>reservation-form.php">Réservation</a></li>
		</ul>
	</nav>
	<div class="logo">
		<img src="<?php echo $path2; ?>CSS/IMAGES/logo.png" alt="Logo de l'entreprise"/>
	</div>
</header>