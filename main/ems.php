<?php 
/**
 * ems.php
 * 
 * retourne les EMS au format JSON
*/

header("Content-type:application/json");
require("../config/connection.php"); 
$names=[];

if(isset($_GET["parametre"])){ 
	$parametre = $_GET["parametre"];
  	$reponse = ("SELECT Id_ems, Nom_ems FROM ems WHERE Pays_ems ='$parametre' ") or die(mysqli_error() );
  	$resultat = $connection->query($reponse);
	while ( $row=mysqli_fetch_array($resultat ) ) {
		array_push($names, [
			"nom" => $row["Nom_ems"],
			"id" => $row["Id_ems"]
		] );
	}
}

print(json_encode(["names" => $names]));
