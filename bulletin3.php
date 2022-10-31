<?php session_start();

if (!isset($_SESSION["username"])) {
  
  header("location:auth.php");
}


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
                  <h2 class="section-title"  style="color:white"  >BULLETIN L3</h2>
                  <a class= "btn btn-dark" href="bulletin.php">Licence 1</a>
                  <a class= "btn btn-dark" href="bulletin2.php">Licence 2</a>
                </div>

                  <?php
                  //DÃ©clarer et initialiser les listes des coefficient et matiÃ¨re
                  // $option=['Option LCA','Option 2','Option 3'];
                  
                  $matiere=['Algorithme 3','Javascript','Base de donnée Avancée','Droit','Developement Personnel','Theorie des Langages','Architecture logiciel'];
                  $coeff=[3,4,4,2,2,4,3]; 
                  //initialiser la variable s qui reprÃ©sentera la somme   
                  $s=0;
                  //Calculer la somme des notes avec les pondÃ©rations
                 
                  
                  if(isset($_POST['note']))
                  {
                    if (isset($_POST['exam'])) {
                      
                      for ($i=0; $i <=6; $i++)
                      { 
                        $s = $s + $coeff[$i]* ($_POST['note'][$i]*0.4 + $_POST['exam'][$i]*0.6);
                      }
                      $t=0;
                    }
                  }
                  ?>    
                  </head>
                  <body>
                  <div class="container-fluid">
                    <h1></h1>
                    <div class="row  mb-5 justify-content-center">
                      <div class="col-8 items-center"style="background-color:#f9bb09; color:white">
                  <!--***************************************************************************************************************
                  //formulaire d'envois des notes      -->
                  <form action="#" method="POST">
                    <table  class="table table-bordered table-responsive">
                    <thead>

                      <?php 

                      echo
                           
                        '<tr>'.
                        '<td><input type="text" class="form-control" value="'.((isset($_POST['nom']))? $_POST['nom']:'').'" size="5" name="nom"  placeholder="Nom Complet" required></td>'.
                        '<td><input type="text" class="form-control" value="'.((isset($_POST['id']))? $_POST['id']:'').'" size="5" name="id" placeholder="id" required></td>'.
                        '<td><input type="text" class="form-control" value="'.((isset($_POST['classe']))? $_POST['classe']:'').'" size="5" name="classe" placeholder="classe" required></td>'.
                        
                        '</tr>';
                      
                      
                      ?>
                      <tr>
                      <th>Module</th>
                      <th>Devoir</th>
                      <th>Examer</th>
                      <th>Coefficient</th>
                      <th>total</th>
                      </tr>
                    </thead>
                    <theed> 
                    <?php
                  // boucle d'affichage des lignes des matiÃ¨res principales 
                  
                    for ($key=0; $key <= 6; $key++) 
                    { 
                      echo
                      '<tr>'.
                      '<td>'.$matiere[$key].'</td>'.
                      '<td><input type="text" class="form-control" value="'.((isset($_POST['note']))? $_POST['note'][$key]:'').'" size="5" name="note[]"  required></td>'.
                      '<td><input type="text" class="form-control" value="'.((isset($_POST['exam']))? $_POST['exam'][$key]:'').'" size="5" name="exam[]"  required></td>'.
                      '<td>'.$coeff[$key].'</td>'.
                      '<td>'.(isset($_POST['note'] ) && isset($_POST['exam'])? ($_POST['note'][$key]*0.4 + $_POST['exam'][$key]*0.6 )*$coeff[$key]:'').'</td></tr>';
                    }
                    ?>
                  <!------------------Ligne total sans options--------------------------------------->
                    <tr>
                    <td>Total point</td>
                    <td></td>
                    <td></td>
                    <td></td>

                    
                    <td ><?php    echo number_format($s,2); ?></td>
                    </tr>
                  <!------------------les lignes des options---------------------------------------> 
                  <?php
                  //   for ($key=0; $key <= 2; $key++)
                  //   {
                  //       if ( isset($_POST['option'][$key]))
                  //       {
                  //           if($_POST['option'][$key] <=10 )
                  //         {
                  //           $NoteOption1 =0 ;
                  //           $NoteOption=$_POST['option'][$key];
                  //         }
                  //         else
                  //         {
                  //           $NoteOption1 =$_POST['option'][$key]-10 ;
                  //           $NoteOption=$_POST['option'][$key];
                  //         }
                  //       }
                  //       echo
                  //       '<tr>'.
                  //       '<td>'.$option[$key].'</td>'.
                  //       '<td><input type="text" class="form-control" value="'.$NoteOption.'" size="5" name="option[]"  ></td>'.
                  //       '<td>'.$coefOption[$key].'</td>'.
                  //       '<td>'.$NoteOption1*$coefOption[$key].'</td></tr>';
                  //       // la somme des points des options selon les rÃ©gles du calculs en vigueurs 
                  //       $t=$t+$NoteOption1*$coefOption[$key];
                  // }
                  ?>
                  <tr>
                      <td >Moyenne</td>
                      <td><?php    echo $s/22; ?></td>
                      <td ><strong>
                      <?php 
                      // $total=(int) $s+$t;  echo $total.'<br>';
                      // if($total<1000) echo 'Non admis.e';
                      // elseif($total<=1200 && $total >=1000) echo 'mention Passable';
                      // elseif($total<=1400 && $total >=1200) echo 'mention Assez-bien';
                      // elseif($total<=1600 && $total >=1400) echo 'mention Bien';
                      // elseif($total<=1800 && $total >=1600) echo 'mention TrÃ¨s Bien';
                      // elseif($total >=1800) echo 'mention Honorable';
                      ?>
                      </strong></td>
                    <td ><strong><input type="submit" name="Envoyer" value="Calculer" class="btn btn-dark"></strong></td>
                    <td><div id="editor"></div>
                    <a  class="btn btn-dark"href="fichier.pdf">PDF</a></td></td>
                  </tr>
                  </theed> 
                  </table>
                      </div>
                      <div class="ol-md-3 bg-info">
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