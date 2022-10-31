<?php
session_start();
if (!isset($_SESSION["username"])) {
  
  header("location:auth.php");
}
$bddPDO = new PDO('mysql:host=localhost;dbname=db_mark','root',"");

$requete = $bddPDO->query("SELECT n.id, n.semestre, n.moyenne, u.nom, u.prenom, cl.niveau, m.nomec FROM note n, utilisateur u, classe cl, module m  where n.id_ec = m.id and n.id_etudiant = u.id and n.id_classe = cl.id ");

// $exec = $requete->execute();

// var_dump($requete); die;

// $notes=$requete->fetchAll();

// while ($note = $requete->fetch()) {
//   var_dump($note); die;
// }



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
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300"
   style="background-image:url(images/background.jpg)">
   
      <div class="site-wrap">

          <!-- <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
              <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
              </div>
            </div>
            <div class="site-mobile-menu-body"></div>
          </div>
           -->
        
          
          <header>

            <nav  class="navbar" style="background-color:#f9bb09;">
              <div class="container">
              <img style="width: 60px; height: 50px;"src="images/supdeco-black.png" alt="">
                  
                  <span  style ="font-family:arial; color:noire; font-weight: 900;
                    text-align: left">
                    Bienvenue <?php echo $_SESSION["username"]?> (Administration)
                  </span>

                  <a class="btn btn-dark" href="admin.php">Ajouter</a>
                  <a class="btn btn-dark" href="bulletin.php">BULLETIN</a>
                  <a class="btn btn-dark" href="liste.php">Notes</a>

                  
                
                
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
                                <thead>
                                <tr>
                                    
                                    <th colspan="2">Etudiant</th>
                                    <th>Module</th>
                                    <th>Semestre</th>
                                    <th>Classe</th>
                                    <th>Note</th>
                                    <th>-</th>
                                    
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($notes = $requete->fetch()) {

                                    ?>
                                <tr>
                                    
                                    <td><?= $notes['nom']?></td>
                                    <td><?= $notes['prenom']?></td>
                                    <td><?= $notes['nomec']?></td>
                                    <td><?= $notes['semestre']?></td>
                                    <td><?= $notes['niveau']?></td>
                                    <td><?= $notes['moyenne']?></td>
                                
                                    <td> <a href="supprimer.php?id=<?= $notes['id'];?>" onclick="return confirm('Etes vous sûr de vouloir supprimer?')" class="btn btn-danger btn-sm">SUPPRIMER</a></td>
                                    
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
        </div>
          
             

        
    

  

    



  
    
  

  
    
      </div>
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




      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


      <script src="js/pdf.js"></script>
        

  
  
  

  
    
  </body>
</html>



