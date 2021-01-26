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
		<main class="mainplanning">
			<table>
				<thead>
					<tr>
						<td class="hour">Heures</td>
						<td class="day">Lundi</td>
						<td class="day">Mardi</td>
						<td class="day">Mercredi</td>
						<td class="day">Jeudi</td>
						<td class="day">Vendredi</td>
					</tr>
				</thead>
				<tbody>
				<?php
					$hour = 8;
					$today = date('d');
					$table = $bdd->query('SELECT id, id_utilisateur, titre, DATE_FORMAT(`debut`, "%H") AS `debut`, DATE_FORMAT(`debut`, "%d") AS `dstart`, DATE_FORMAT(`fin`, "%H") AS `fin`, DATE_FORMAT(`fin`, "%d") AS `dend` FROM `reservations` ORDER BY `debut`');
					
					while($ligne = $table->fetch_assoc()){
						$hstart = $ligne['debut'];
						$dstart = $ligne['dstart'];
						$dend = $ligne['dend'];
						$hend = $ligne['fin'];
						$userid = $ligne['id_utilisateur'];
						$idbooking = $ligne['id'];
						$title = $ligne['titre'];
					}
					
					while($hour<20){
						echo '<tr><td class="hour">'.$hour.':00</td>';
						for($day = $today-1; $day<$today+4; $day++){
							
							$ligne2 = mysqli_fetch_assoc($bdd->query('SELECT login FROM utilisateurs WHERE id="'.$userid.'"'));
								
							if($hour == 20){break;}
							
							if($hour == $hstart && $day == $dstart){
							echo '<td><a href="reservation.php?id='.$idbooking.'"><p>'.$ligne2['login'].'&nbsp&nbsp<u>'.$title.'</u></p></a></td>';
							}
							elseif($hour == $hend && $day == $dend){
								echo '<td><a href="reservation.php?id='.$idbooking.'"><p>'.$ligne2['login'].'</p></a></td>';
							}
							else{echo '<td><a href="reservation-form"><p></p></a></td>';}
						}
						$hour++;
					}
				?>
				</tbody>
			</table>
		</main>
		<?php include('../INCLUDES/mainfooter.php') ?>
	</body>
</html>