<?php require("config.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
</head>
<body>

	<form>
		Pays:<br>

				<?php 
				    $requete=mysqli_query($mysqli, "SELECT * FROM `pays` ORDER BY `PAYS_NOM`") or die(mysqli_error($mysqli));
				?>

				<select id="select1">
					<?php while( $resultat=mysqli_fetch_assoc($requete) ){ ?>
						<option value="<?= $resultat["ID_PAYS"]; ?>"> <?= $resultat["PAYS_NOM"]; ?>  </option>
					<?php }?>
				</select>
		<br><br>


		Utilisateur:<br> 
				<select id="select2">
					
				</select>
	</form>
</body>
		<script type="text/javascript" src="app.js">
			
		</script>
</html>