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
		<main class="mainreservation">
			<?php
				$table = $bdd->query('SELECT titre, description, id_utilisateur FROM reservations WHERE id_utilisateur="'.$_SESSION['id'].'"');
				
				while($ligne = $table->fetch_assoc()){
					$userid = $ligne['id_utilisateur'];
					$ligne2 = mysqli_fetch_assoc($bdd->query('SELECT login FROM utilisateurs WHERE id="'.$userid.'"'));
					$login = $ligne2['login'];
					echo '<div>'.$ligne2['login'].'</div>';
					echo '<div>'.$ligne['titre'].'</div>';
					echo '<div>'.$ligne['description'].'</div>';
				}
			?>
		</main>
		<?php include('../INCLUDES/mainfooter.php') ?>
	</body>
</html>

<?php
	if(empty($_SESSION['login'])){
		header('location:../index.php');
	}
	
	if($_SESSION['login'] != $login){
		header('location:planning.php');
	}
?>