 <?php   
   //Connection avec la BDD. 
 session_start();
include("../config/connection.php");

   ?>


<!DOCTYPE html>
<html> 
<head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>GESTION DES ALARMES IN/VAS</title>
            <meta name="viewport" content="width=device-width, initialscale=1.0">
            <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
            <link rel="shortcut icon" href="favicon.ico">
          
            <script src="tabs.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" href="tabs.css" />

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

</head>


<body>



          <br>
               <!-- Début contenair Entête -->
                <div class="container">
                          <!-- Début row 1 -->
                            <div class="row" >  
                              <!-- Début card -->
                                  <div class="card col-lg-8">
                                                <!-- box-header -->
                                                <div class="box-header with-border">                                       
                                                              <center>   <img src="../images/logo.png" height="100"> </center>                                    

                                                </div>
                                               <!-- /.box-header -->
                                  </div>

                                  <!-- Début card -->
                                  <div class="card col-lg-4">
                                                <!-- box-header -->
                                                <div class="box-header with-border">                                       
                                                            <label class="card-text">    
                                                                                        TYPE UTILISATEUR : <?php    $voir = $_SESSION['Id_person'];
                                                                                                                              echo $voir;  
                                                                                                             ?>
                                                           </label>                                 

                                                </div>
                                               <!-- /.box-header -->

                                                 <div class="card-text">                                       
                                                      <h5><?php echo 'Bienvenue'.'  '.$_SESSION['Nom_person'].'  '.$_SESSION['Prenom_person'].' ';   ?></h5>

                                                </div>
                                               <!-- /.box-header -->


                                              <div>
                                                    <h5> 
                                                        <a href="logout.php"> <button class="btn btn-danger">DECONNEXION </button>  </a> 
                                                   </h5> 
                                              </div>     
                                         


                                  </div>
                            </div>
                             <!-- Fin row 1 -->
                  
                </div>
                 <!--Fin contenair Entête -->
          <br>
          	    	
              
          					   

            <!-- Début contenair Menu-->
            <div class="container">
          		       <div class="row" >


          		            <!-- <div class="card col-lg-2">
          		            
                           <a href="admin.php?page=gesart" >  <input class="btn  btn-secondary" type="submit" value="GESTION DES ARTICLES" style=" border-radius: 50px; "/> </a> 
          		           </div> -->

          		           <!--  <div class="card col-lg-2" >
          		                   <a href="admin.php?page=gesvdt"> <input class="btn  btn-danger" type="submit" value="GESTION DES VENDEURS" style=" border-radius: 50px; " /> </a> 
          		            </div> -->

          		             <div class="card-text col-lg-2">
          		             <a href="admin.php?admin=gesart">  <input class="btn btn-primary" type="submit" value="GESTION DES ALARMES" style="border-radius: 50px; " /> </a> 
          		            </div>

          		           <!--  <div class="card col-lg-2">
          		              <a href="admin.php?page=gescmd"> <input class="btn btn-warning" type="submit" value="COMMANDE DES ARTICLES"  style="border-radius: 50px; " /> </a> 
          		            </div> 

          	                 <div class=" col-lg-4">
          	                  <a href="admin.php?page=gescrs"> <input class="btn btn-warning" type="submit" value="GESTION DES COURS"  style="border-radius: 50px; " /> </a> 
          	                </div>  -->

           

          		       </div>
            </div>
            <!--Fin contenair Menu -->

            <br>
		          
       	       
        <?php 
               switch ($_GET['admin'] ) {

                case 'gesart':
                  # code...
                include("gestionarticle.php");
                  break;

                case 'gesvdt':
                  # code...
                include("gestionvendeur.php");
                  break;

                  case 'gesclt':
                  # code...
                  include("gestionclient.php");
                  break;

                  case 'gescmd':
                  # code...
                  include("gestioncommande.php");
                  break;

                 case 'gescrs':
                  # code...
                  include("gestioncours.php");
                  break;

                default:
                  # code...
                  break;

              }                
              
             
         ?>


    



   
  <!-- Modernizr JS -->
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
  
 