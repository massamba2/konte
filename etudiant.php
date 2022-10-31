<?php 
session_start();

if (!isset($_SESSION["username"])) {
  
  header("location:auth.php");
}

$id = $_SESSION['id'];

// echo $id; die;


$bddPDO = new PDO('mysql:host=localhost;dbname=db_mark','root',"");

$requete = $bddPDO->prepare('SELECT n.id, n.semestre, n.moyenne, m.nomec FROM note n, module m, utilisateur u WHERE n.id_ec = m.id AND n.id_etudiant = u.id AND n.id_etudiant = ?');

$exec = $requete->execute(array($id));







?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GPE&mdash; NOTE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
   
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style= "background-image:url(images/background.jpg)">
        
        <header  >
          <nav  class="navbar" style="background-color:#f9bb09">
            <div class="container-fluid">
            <img style="width: 60px; height: 50px;"src="images/supdeco-black.png" alt="">
              <a  style ="font-family:arial; color:noire; font-weight: 900"class="navbar-brand">
                  Bienvenue <?php echo $_SESSION["username"]?> (Etudiant)
             </a>
              <a href="deconnection.php"class="btn btn-danger" >Déconnection</a>
            </div>
          </nav>
          
        </header>

        
            <div class="site-section" id="bulletin">
                <div class="container">
                    <div class="row mb-5 justify-content-center">
                        <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
                        <h2 class="section-title"  style="color:white"  >Listes Notes</h2>
                        </div>

                          <div  class="col-lg-12" style="color:white">
                            <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead style="color:white">
                                <tr>
                                    
                                    <th>Module</th>
                                    <th>Semestre</th>
                                    <th>Note</th>
                                    
                                    
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($notes = $requete->fetch()) {
                                      ?>
                                    
                                <tr>
                                   
                                    <td><?= $notes['nomec']?></td>
                                    <td><?= $notes['semestre']?></td>
                                    <td><?= $notes['moyenne']?></td>
                                
                                    
                                </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        

                
                  
                 

              

              
                    </div>
                </div> 
            </div>
        
                        



  
  

  
      </div> <!-- .site-wrap -->

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.fancybox.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/main.js"></script>

          
    
  
  
  
  
    
  </body>
</html>