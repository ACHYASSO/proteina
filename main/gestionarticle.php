<!-- connection à la base de donnée pour afficher les éléments dans la table-->
 <?php   
       include("../config/connection.php");

?>
<!DOCTYPE html>

<html> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ADMINISTRATION DES ARTICLES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- Google Webfont -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'> -->
         <!-- Animate.css -->
        <link rel="stylesheet" href="../css/animate.css">
         <!-- corps Style -->
         <link rel="stylesheet" href="../css/body.css">
          <!-- bootstrap Style -->
         <link rel="stylesheet" href="../css/bootstrap.min.css">

         <link rel="stylesheet" href="../css/boostrap.css">

         <link rel="stylesheet" href="../css/ bootstrap-grid.css">

         <link rel="stylesheet" href="../css/ bootstrap-grid.min.css">

          <link rel="stylesheet" href="../css/ bootstrap-reboot.css">

          <link rel="stylesheet" href="../css/ bootstrap-reboot.min.css">

          <link rel="stylesheet" href="../css/ bootstrap-reboot.min.css">

            <!-- Easy Responsive Tabs -->
          <link rel="stylesheet" href="../css/easy-responsive-tabs.css">

            <!-- Magnific Popup -->
          <link rel="stylesheet" href="../css/magnific-popup.css">

           <!-- Superfish -->
          <link rel="stylesheet" href="../css/superfish.css">

         <link rel="stylesheet" href="../css/ megafish.css">

          <!-- menu Style -->
          <link rel="stylesheet" href="../css/menu_slideside.css">

          <!-- Owl Carousel -->
          <link rel="stylesheet" href="../css/owl.carousel.min.css">
          <link rel="stylesheet" href="../css/owl.theme.default.min.css">
           
          <!-- Themify Icons -->
          <link rel="stylesheet" href="../css/themify-icons.css">


   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- MDBootstrap Datatables -->
      <link href="../free_css/css/addons/datatables.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>


<body>

    <!-- Déébut contenair de la card -->
      <div class="container">
        <!-- Déébut row de la card -->
            <div class="row" >  
              <!-- Début card -->
    		          <div class="card col-lg-12">

                            <?php

                               if( isset($_GET['id'] ))

                                  {
                                   $prendre=$_GET['id'];

                                   $mod=mysqli_query(" SELECT id_article,id_cat_article,ref_article,lib_article,prix_article,date_article,description_article,photo_article
                                                        FROM article 
                                                       WHERE article.id_article='$prendre' LIMIT 1 ")  
                                    or die('Erreur SQL !'.$mod.'<br>'.mysqli_error() ); 

                                    $article = mysqli_fetch_assoc($mod);
                              ?>


                                        <center> 
                                               <form method="POST" action="modifierarticle.php" enctype="multipart/form-data" > 

                                                                                   <input type="hidden" name="id_article" value="<?= $article['id_article']; ?>">
                                                               <table>
                                                                                         <h5 class="card-header">GESTION DES ARTICLES</h5>
                                                                                         <H6 class="card-text">MODIFIER OU SUPPRIMER DES ARTICLES </H6>
                                                                                         <tr>
                                                                                              <td><label class="card-text">CATEGORIE:</label></td>
                                                                                            <td> 
                                                                                                  <?php
                                                                                                     $reponse=mysqli_query("SELECT * FROM cat_article") or die(mysqli_error() );
                                                                                                 ?>

                                                                                            <select name="cat_article" class="form-control" >
                                                                                                  <?php
                                                                                                      while($donnees=mysqli_fetch_array($reponse)){ 

                                                                                                    if($donnees['id_cat_article']==$article['id_cat_article']){
                                                                                                             
                                                                                                             echo '<option selected="true" value="'.$donnees['id_cat_article'].'">'.$donnees['lib_cat_article'].'</option>';

                                                                                                          }else{
                                                                                                           echo '<option value="'.$donnees['id_cat_article'].'">'.$donnees['lib_cat_article'].'</option>';
                                                                                                          }
                                                                                                    }
                                                                                                 ?>
                                                                                              </select>

                                                                                              </td>
                                                                                        </tr>

                                                                                                  
                                                                                        <tr>
                                                                                          <td><label class="card-text">REFERENCE :</label></td>
                                                                  <td><input name="reference_article" type="text"  size="25" required class="form-control" value="<?= $article['ref_article']; ?>"/></td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                          <td><label class="card-text">INTITULE :</label></td>
                                                                    <td><input name="intitule_article" type="text"  size="25" required class="form-control" value="<?= $article['lib_article']; ?>"/></td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                          <td><label class="card-text">PRIX :</label></td>
                                                                    <td><input name="prix_article" type="text"  size="25" required class="form-control" value="<?= $article['prix_article']; ?>" /></td>
                                                                                           <td><input type="hidden">FCFA</td>

                                                                                        </tr>

                                                                                        <tr>
                                                                                          <td><label class="card-text">DATE ENREGISTREMENT :</label></td>
                                                                    <td><input name="date_article" type="date"  required class="form-control" value="<?= $article['date_article']; ?>" /></td>
                                                                                        </tr>
                                                                                        
                                                                                        <tr>
                                                                                          <td><label>DESCRIPTION :</label></td>  
                                                        <td><textarea name="description_article" id="textarea" rows="3" class="form-control" > <?= $article['description_article']; ?></textarea></td>
                                                                                        </tr>
                                                                                        
                                                                                        <tr>
                                                                                          <td><label >PHOTO DE L'ARTICLE :</label></td>

                                                          <td>

                                                            <div align="center" style="width: 300px">
                                                              <img style="width: inherit;" src="http://<?= $_SERVER['HTTP_HOST'].'/vente_en_ligne/tantanpion/'.$article['photo_article'];?>">
                                                            </div>
                                                            <input type="file" id="wizard-picture" name="photo_article" class="form-control" size="40" value="<?= $article['photo_article'];?>" />
                                                            </td>
                                                                                        </tr>

                                                                                                                   
                                                          </table>
                                                    

                                                    <p class="envoyer">
                                                       <input class="btn btn-primary" type="submit" value="MODIFIER" style="margin-left:px;" />

                                                       <input class="btn btn-danger" type="reset" value="ANNULER" style="margin-left:100px;"/>
                                                     </p>
                                           </form> 
                                    </center>  


                            <?php 
                                } else {

                             ?>    





 <form method="POST" action="enregistrerarticle.php" enctype="multipart/form-data" > 
                   <!-- Début row  -->
                        <div class="row">                                    

                                            <!-- Début  formulaire gauche -->
                                            <div class="col-sm-5">

                                                 
                                                     
                                                          <center>
                                                                <table>
                                                                    <center> <h5 class="card-header">GESTION DES ALARMES</h5> </center> 
                                                                    <center> <h6 class="card-text" color="rouge">ENREGISTRER UNE ALARME</h6> </center><br>

                                                                       <form>
                                                                                <tr>
                                                                                    <td>
                                                                                      <label class="card-text">Pays Concerné:</label>
                                                                                    </td>

                                                                                    <td> 
                                                                                          <?php
                                                                                                 $reponse = ("SELECT * FROM pays") or die(mysqli_error() );
                                                                                                 //// on envoie la requête
                                                                                                 $resultat = $connection->query($reponse);
                                                                                           ?>
                                                                                       
                                                                                          <select id="select1" name="niv_alarme" class="form-control" >
                                                                                                <?php
                                                                                                    while($donnees=mysqli_fetch_array($resultat )){ 
                                                                                                                                                                                                                                                                                                
                                                                                                    echo '<option value="'.$donnees['ID_PAYS'].'">'.$donnees['PAYS_NOM'].'</option>';
                                                                                                     }
                                                                                                 ?>
                                                                                          </select>
                                                                                     </td>

                                                                                 </tr>



                                                                                 <tr>
                                                                                    <td>
                                                                                       <label class="card-text">Domaine Concerné:</label>
                                                                                    </td>

                                                                                    <td>                                                                    
                                                                                        <select id="select2" name="nom_domaine" class="form-control" >
                                                                                           
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>


                                                                                 <tr>
                                                                                    <td>
                                                                                      <label class="card-text">EMS Concerné:</label>
                                                                                    </td>

                                                                                    <td>                                                                          
                                                                                       <select id="select3"  class="form-control">
                                                                                        
                                                                                       </select>
                                                                                    </td>
                                                                                </tr>
                                                                       </form>

                                                                                                                                      
                                                                         <tr>
                                                                              <td>
                                                                                <label class="card-text">Niveau Alarme : </label>
                                                                              </td>


                                                                              <td> 
                                                                                      <?php
                                                                                             $reponse = ("SELECT * FROM niveau_alarme") or die(mysqli_error() );
                                                                                             //// on envoie la requête
                                                                                             $resultat = $connection->query($reponse);
                                                                                       ?>
                                                                                   
                                                                                      <select name="niv_alarme" class="form-control" >
                                                                                            <?php
                                                                                                while($donnees=mysqli_fetch_array($resultat )){ 
                                                                                                                                                                                                                                                                                            
                                                            echo '<option value="'.$donnees['Id_niveau_alarme'].'">'.$donnees['Nom_niveau_alarme'].'</option>';
                                                                                                 }
                                                                                             ?>
                                                                                      </select>


                                                                              </td>


                                                                             
                                                                        </tr>

                                                                         

                                                                        <tr>
                                                                          <td><label class="card-text">Nombre d'appariton :</label></td>
                                                                          <td><input name="nomb_appari" type="number"  size="10"  class="form-control"/></td>
                                                                        </tr>

                                                                        <tr>
                                                                          <td><label class="card-text">Date Apparition :</label></td>
                                                                          <td><input name="date_apparu" type="date"  size="25" required class="form-control"/></td>
                                                                          <!-- <td><input type="hidden">FCFA</td> -->
                                                                        </tr>

                                                                        <tr>
                                                                          <td><label class="card-text">Date Apparition :</label></td>
                                                                          <td><input name="date_apparu" type="time"  size="25" required class="form-control"/></td>
                                                                          <!-- <td><input type="hidden">FCFA</td> -->
                                                                        </tr>



                                                              </table>
                                                          </center>


                                                                                          

                                            </div>
                                            <!-- Fin  formulaire gauche -->


 


                                    <!-- Début  formulaire droit -->
                                            <div class="col-sm-7">

                                                
                                                                  
                                                  <center> <h5 class="card-header">INFORMATIONS DONNEES PAR LE BO SUR CETTE ALARME</h5> </center> 
                                                  <center> <h7 class="card-text" style="color: red;" >A REMPLIR (pour plus de précision sur cette alarme)</h7> </center>
                                                  <br>
  
                                                           <center>
                                                                <table>
                                                                           <tr>
                                                                              <td>
                                                                                <label class="card-text">Back Office Contacté : </label>
                                                                              </td>


                                                                              <td> 
                                                                                      <?php
                                                                                             $reponse = ("SELECT * FROM personne") or die(mysqli_error() );
                                                                                             //// on envoie la requête
                                                                                             $resultat = $connection->query($reponse);
                                                                                       ?>
                                                                                   
                                                                                      <select name="bo_contacte" class="form-control" >
                                                                                            <?php
                                                                                                while($donnees=mysqli_fetch_array($resultat )){ 
                                                                                                                                                                                                                                                                                            
                                                                                                echo '<option value="'.$donnees['Id_person'].'">'.$donnees['Nom_person'].'</option>';
                                                                                                 }
                                                                                             ?>
                                                                                      </select>


                                                                              </td>
                                                                        </tr>



                                                                     

                                                                         <tr>
                                                                          <td><label class="card-text">Signification de cette alarme :</label></td>
                                                                          <td><input name="sign_alarme" type="text"  size="25"   class="form-control"/></td>
                                                                        </tr>

                                                                           <tr>
                                                                          <td><label class="card-text">Conséquence de cette alarme :</label></td>
                                                                          <td><input  name="conseq_alarme" type="text"  size="25"   class="form-control"/></td>
                                                                        </tr>

                                                                         <tr>
                                                                            <td><label class="card-text">Plan d'action de cette alarme :</label></td> 
                                                                            <td><textarea name="plact_alarme" type="text"  size="25"   class="form-control" > </textarea></td>
                                                                            
                                                                        </tr>                                                                        
                                                          </table>
                                                    </center>

                                           </div>
                                           <!-- Fin  formulaire droit -->                               

                                                      
                                                                          
                        </div>
                        <!--   fin row -->  
                        <br>
                                  <center>                                       
                                           <button  class="btn btn-primary" type="submit"> Enregistrer </button>

                                           <button  class="btn btn-danger" type="reset"  style="margin-left:100px;"> Annuler </button>

                                  </center>
                        <br>


                                  
</form>  
                                                
                                              

                     
                                                                
                                                   

                   </div>
                   <!-- Fin card principal-->
            </div>
            <!-- Fin row de la card principal-->
      </div> 
    <!-- Fin contenair de la card principal-->


  <?php
      }

   ?>


     <!--  Fin cette partie permet d'afficher le formulaire normal-->


                          <!-- connection à la base de donnée pour afficher les éléments dans la table-->
                               <?php   
                                        $reponse = ("SELECT * FROM personne") or die(mysqli_error() );
                                         //// on envoie la requête
                                         $resultat = $connection->query($reponse);                                                             
                                 ?> 
                         <!-- fin connection à la base de donnée pour afficher les éléments dans la table--> 


<br>
      <!-- Début contenair 2 de la card -->
      <div class="container">
            <!-- Début row de la card -->
            <div class="row" >  
              <!-- Début card -->
                  <div class="card col-lg-12">
                                <!-- box-header -->
                                <div class="box-header with-border">                                 
                                        <center><h4 class="card-title">------------------------------------------------------------------------------------------------------</h4></center> 
                                             <center><h4 class="card-title">LISTE DES ALARMES</h4></center> 
                                        <center><h4 class="card-title">------------------------------------------------------------------------------------------------------</h4></center> 

                                </div>
                               <!-- /.box-header -->


                                <div class="box-header ">
                                      <h5 class="card-text"> <b><span style="color:#C4A006;">Recherche Par: Cas1,Cas2,Cas3</span></b></h5>
                                </div>


                                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">

                                                                         <thead>
                                                                              <tr>     

                                                                                    <th class="auto">Code</th>

                                                                                    <th class="th-sm">Nom</th>

                                                                                    <th class="th-sm">Prénoms </th>

                                                                                    <th class="th-sm">Eglise d'Origine</th>

                                                                                    <th class="th-sm">Numéro de Téléphone</th>

                                                                                    <th class="th-sm"></th>
                                                                                    <th class="th-sm"></th>
                                                                                    <th class="th-sm"></th>
                                                                              </tr>
                                                                        </thead>





                                                                  <tbody>
                                                                                                
                                                                              <?php    //On affiche les lignes du tableau une à une à l'aide d'une boucle
                                                                                      while($donnees = mysqli_fetch_array($resultat))
                                                                                      {

                                                                                ?>


                                                                        <tr>

                                                                                 <td >
                                                                                       <?= $donnees['Id_person']; ?>
                                                                                  </td>
                                                                               
                                                                                  <td >
                                                                                       <?= $donnees['Nom_person']; ?>
                                                                                  </td>

                                                                                  <td>
                                                                                       <?= $donnees['Prenom_person']; ?> 
                                                                                 </td>

                                                                                  <td> 
                                                                                       <?= $donnees['Sexe_person']; ?>
                                                                                  </td>

                                                                                  <td>
                                                                                     
                                                                                         <?= $donnees['Mail_person']; ?> 
                                                                                  </td>


                                                                                  <td> 
                                                                                        <a href="index.php?page=gesrechfid&amp; id=<?= $donnees['Id_person']; ?>" >
                                                                                          <button class="btn btn-primary" name="modifier"> Modifier</button>  
                                                                                        </a> 
                                                                                  </td>

                                                                                   <td>
                                                                                      <a href="Trait_suppression_fidele.php?id=<?= $donnees['Id_person']; ?>" > 
                                                                                        <button class="btn btn-danger" name="supprimer"  onKeyPress="return confirmSubmit(this, event)"  >Supprimer</span></button> 
                                                                                      </a> 
                                                                                  </td> 


                                                                                   <td>
                                                                                      <a href="pages/Modifier_fidele/pdf.php ?id=<?= $donnees['Id_person']; ?>" > 
                                                                                        <button class="btn btn-warning" name="supprimer">Voir profil</button> 
                                                                                      </a> 
                                                                                  </td> 

                                                                        </tr>

                                                                      <?php
                                                                        }      //fin de la boucle, le tableau contient toute la BDD
                                                                       //mysqli_close($connection);
                                                                        ?>

                                                                  </tbody>
                                                                                                                         

                                          </table>               
                    
                  </div>
                  <!-- Fin card -->
           </div>
           <!--Fin row de la card -->
      </div>
      <!-- Fin contenair 2 de la card -->


<br>

      <!-- Début contenair Pied de page 3 de la card -->
      <div class="container">
        <!-- Début row de la card -->
            <div class="row" >  
              <!-- Début card -->
                  <div class="card col-lg-12">
                                <!-- box-header -->
                                <div class="box-header with-border">                                       
                                             <center><h4 class="card-title">LISTE DES ALARMES</h4></center>                                     

                                </div>
                               <!-- /.box-header -->
                  </div>
            </div>
        
      </div>
       <!--Fin contenairPied de page  3 de la card -->

<br>







<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../js/mdb.min.js"></script>


  <!-- MDBootstrap Datatables -->
<script type="text/javascript" src="../js/addons/datatables.min.js"></script>



<script type="text/javascript">

$(document).ready(function () {
      $('#dtBasicExample').DataTable({
             "lengthMenu": [[2, 4, 5, -1], [2, 4, 5, "Voir Tout"]]
         } );
      $('.dataTables_length').addClass('bs-select');

      });

</script>


<script type="text/javascript" src="app.js">
      
</script>

<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.bundle.min.js"> </script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/easyResponsiveTabs.js"></script> 
<script src="../js/fastclick.js"></script>
<script src="../js/hoverIntent.js"></script>
<script src="../js/inview.min.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/jquery.waypoints.min.js"></script>
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/modernizr-2.6.2.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/respond.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/superfish.js"></script>
<script src="../js/supersubs.js"></script>
  



</body>
</html>