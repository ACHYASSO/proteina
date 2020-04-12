<?php 
/**
 * utilisateurs.php
 * 
 * retourne les utilisateur au format JSON
*/

header("Content-type:application/json");

require("config.php");  //Elements de connexion

$names=[]; //contiendra les noms

if(isset($_GET["parametre"])){ //parametre parametre(pays) fourni
	
	$parametre = $_GET["parametre"]; //recuperer le pays

	//var_dump($parametre);
	
	//effectuer la requête
	$res=mysqli_query($mysqli, "SELECT Nom_ems FROM `ems` WHERE Pays_ems ='$parametre' ") or die(mysqli_error($mysqli));
	
	//charger les noms
	while ( $row=mysqli_fetch_assoc($res) ) {
		array_push($names, $row["Nom_ems"] );
	}
}

print(json_encode(["names" => $names]));