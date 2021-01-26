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
		<main class="mainconnexion">
			<form method="post">
				<label for="login">Login : </label>
					<input required type="text" name="login" maxlength="255"/>
				<label for="password">Mot de passe : </label>
					<input required type="password" name="password" maxlength="255"/>
				<input class="submit" name="connexion" type="submit" value="Connexion"/>
			</form>
			<p><?php echo $_SESSION['message']; ?></p>
		</main>
		<?php include('../INCLUDES/mainfooter.php') ?>
	</body>
</html>

<?php
	if(!empty($_SESSION['login'])){
		header('location:profil.php');
	}

	if(!empty($_POST['login']) && !empty($_POST['password'])){
		$table = $bdd->query('SELECT * FROM utilisateurs WHERE login="'.$_POST['login'].'"');
		
		$password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
		while($ligne = $table->fetch_assoc()){
			$_SESSION['password'] = $ligne['password'];
			$_SESSION['id'] = $ligne['id'];
		}
		
		if(mysqli_num_rows($table) == 0){
			$_SESSION['message'] = 'Login ou Mot de passe incorrect';
			header('refresh: 0');
		}
		elseif(password_verify($_POST['password'], $_SESSION['password'])){
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['header'] = '<style>.liconnexion, .liinscription{position: absolute; z-index: -10; left: 2000px; opacity: 0;} .liprofil, .lireservation{position: relative; z-index: 1; opacity: 1;}</style>';
			$_SESSION['password'] = $_POST['password'];
			
			header('location: profil.php');
		}
	}
	else{$_SESSION['message'] = '';}
?>