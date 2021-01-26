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
		<main class="mainreservation-form">	
			<form method="post">
				<label for="title">Titre :</label>
					<input required name="title" maxlength="20"></input>
				<label for="description">Description :</label>
					<textarea required name="description" maxlength="50"></textarea>
				<label for="hstart">Heure de début :</label>
					<input required type="datetime-local" name="hstart" min="25-01-2021T08:00" max="25-01-2022T18:00">
				<label for="hend">Heure de fin :</label>
					<input required type="datetime-local" name="hend" min="25-01-2021T09:00" max="25-01-2022T19:00">
				<input class="submit" type="submit" value="Réserver"/>
			</form>
		</main>
		<?php include('../INCLUDES/mainfooter.php') ?>
	</body>
</html>

<?php
	if(empty($_SESSION['login'])){
		header('location:connexion.php');
	}
	
	if(!empty($_POST['title']) && !empty($_POST['description'])){
		if($_POST['hstart'] > $_POST['hend'] || $_POST['hstart']+3600 != $_POST['hend']){
			header('refresh:0');
		}
		else{
			$table = $bdd->prepare('INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES("'.$_POST['title'].'","'.$_POST['description'].'","'.$_POST['hstart'].'","'.$_POST['hend'].'","'.$_SESSION['id'].'")');
			$table->execute();
			
			header('location:planning.php');
		}
	}
?>