<?php 
/**
 * utilisateurs.php
 * 
 * retourne les utilisateur au format JSON
*/

header("Content-type:application/json");

require("../config/connection.php");  //Elements de connexion

$names=[]; //contiendra les noms

if(isset($_GET["parametre"])){ //parametre parametre(pays) fourni
	
	$parametre = $_GET["parametre"]; //recuperer le pays

	//var_dump($parametre);
	
	//effectuer la requête
	//$res=mysqli_query($mysqli, "SELECT Nom_ems FROM `ems` WHERE Pays_ems ='$parametre' ") or die(mysqli_error($mysqli));

	  $reponse = ("SELECT Nom_domaine FROM domaine WHERE Pays_concerne ='$parametre' ") or die(mysqli_error() );
	   
	  $resultat = $connection->query($reponse);
	
	//charger les noms
	while ( $row=mysqli_fetch_array($resultat ) ) {
		array_push($names, $row["Nom_domaine"] );
	}
}

print(json_encode(["names" => $names]));