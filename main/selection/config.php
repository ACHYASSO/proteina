<?php 
/**
 * config.php
 * 
 * connection avec MySQLi
 * 
*/

$mysqli=mysqli_connect(
	"localhost", 
	"root", /* <= ton nom d'utilisateur mysql*/ 
	"", /* <= ton mot de passe mysql*/
	"huawei") or die(mysqli_error($mysqli));

  // Style procédural
		mysqli_set_charset($mysqli, "utf8");
