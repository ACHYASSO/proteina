<?php
session_start();
require("../config/connection.php");



 if(isset($_POST['submit'] ))
    { 
       
	   $requete = "SELECT*  FROM personne WHERE   Mail_person = '$_POST[authentification]' 
		                                   AND    Pers_Mot_de_passe = '$_POST[mot_de_passe]'   ";  

		         				//// on envoie la requête
				 $reponse = $connection->query($requete);

		         
		                //var_dump($reponse);

		   // on affiche le résultat pour le visiteur 
		    echo '-----------Connection échouée VEUILLEZ VERIFIER LE LOGIN ET LE MOT DE PASSE SVP-------------.'; 




		    if( ($donnees=mysqli_fetch_array($reponse) ))
		       {  
			        if(isset($donnees) and !empty ($donnees) ) 
			                {
							    $_SESSION['Id_person'] = $donnees['Id_person'];
							    $_SESSION['Matri_person'] = $donnees['Matri_person'];
							    $_SESSION['Nom_person'] = $donnees['Nom_person'];
							    $_SESSION['Prenom_person'] = $donnees['Prenom_person'];
							    //$_SESSION['Prenom_person'] = $donnees['Prenom_person'];
			        
			                     header("location:admin.php");


		  
		                     }


		         }


    } 



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> connexion</title>
	
</head>



<body>
	 <div class="container">
	 	<div class="row"> 
           <div id="block1" class="col-md-12" >
                       <!--Debut formulaire-->

             <form action="" method="POST" accept-charset="utf-8">


		   <h1>CONNEXION</h1>
			  <table >
				
					<tr>
						<td><label>Nom d'utilisateur</label><br/>
</td>
						<td><input type="text" name="authentification" value=""></td>
					</tr>
				
					<tr>
						<td><label>Mot de passe</label><br/></td>
						<td><input type="password" name="mot_de_passe" value=""></td>
					</tr>
				
			</table>
		 	
		 	<button type="submit" class="btn btn-primary" name="submit">OK</button>

		 	<button class="btn btn-danger" type="reset">
                <span class="glyphicon	glyphicon-ok-sign"> Annuler </span>
            </button>

      
	   </form></center>      
              <!--fin formulaire-->

           </div>

	 	</div>


	 </div>	
	 

</body>
</html>