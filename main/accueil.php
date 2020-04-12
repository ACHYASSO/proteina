<?php
session_start();
echo 'Bienvenue'.'  '.$_SESSION['nom_utilisateur'].'  '.$_SESSION['prenom_utilisateur'].' ';

?>

<button type="submit" class="btn btn-primary" name="">
<a href="liste_des_vendeurs.php">   la liste des vendeurs </a>    </button>

