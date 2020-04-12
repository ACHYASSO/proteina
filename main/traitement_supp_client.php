<!-- connection à la base de donnée pour afficher les éléments dans la table-->
 <?php   
       include("../config/connection.php");


/*requête de suppression*/
$prendre=$_GET['id'];     


$supp=mysql_query("DELETE FROM utilisateur WHERE Id_utilisateur=$prendre;") or die(mysql_error() );



header('Location: admin.php?page=gesclt&supp=1');

?>


