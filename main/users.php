<?php 
/**
 * utilisateurs.php
 * 
 * retourne les utilisateur au format JSON
*/

header("Content-type:application/json");

require("../config/connection.php");
$names=[];
if(isset($_GET["parametre"])){
	
	$parametre = $_GET["parametre"];
	$reponse = ("SELECT Id_domaine, Nom_domaine FROM domaine WHERE Pays_concerne ='$parametre' ") or die(mysqli_error() );
	$resultat = $connection->query($reponse);
	
	//charger les noms
	while ( $row=mysqli_fetch_array($resultat ) ) {
		array_push($names, [ 
			"nom" => $row["Nom_domaine"] , 
			"id" => $row["Id_domaine"] 
			]);
	}
}

print(json_encode(["names" => $names]));