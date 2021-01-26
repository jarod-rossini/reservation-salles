<?php
	$pathindex = "../"; 
	$path = "";
	$path2 = "../";
?>

<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../CSS/reservation-salles.css">
		<meta charset="UTF-8">
		<title>Réservation Salles</title>
	</head>
	<body>
		<?php include('../INCLUDES/mainheader.php') ?>
		<main class="mainprofil">
			<h2>Bonjour <?php echo $_SESSION['login']; ?> !</h2>
			<form class="exit" method="post">
				<input class="quit" name="quit" type="submit" value="Déconnexion"/>
			</form>
			<form class="replace" method="post">
				<label for="login">Login : </label>
					<input name="login" type="text" value="<?php echo $_SESSION['login']; ?>"/>&nbsp&nbsp
				<label for="password">Mot de passe : </label>
					<input name="password" type="password" value="<?php echo $_SESSION['password']; ?>"/>
				<input class="submit" name="change" type="submit" value="modifier"/>
			</form>
		</main>
		<?php include('../INCLUDES/mainfooter.php') ?>
	</body>
</html>

<?php
	if(empty($_SESSION['login'])){
		header('location:connexion.php');
	}

	if(isset($_POST['quit'])){
		session_destroy();
		header('location: ../index.php');
	}
	
	if(isset($_POST['change'])){
		$table = $bdd->prepare('UPDATE utilisateurs SET login = "'.$_POST['login'].'", password = "'.password_hash($_POST['password'], PASSWORD_DEFAULT).'"');
		$table->execute();
		
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['password'] = $_POST['password'];
		
		header('refresh: 0');
	}
?>