<?php session_start();

if (!isset($_SESSION["username"])) {
  
  header("location:auth.php");
}

try {
  $db = new PDO("mysql:host=localhost;dbname=db_mark;charset=utf8", "root", "");
} catch (\Exception $e) {
  die("Erreur " . $e->getMessage());
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
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style = "background-image:url(images/background.jpg)" >
   
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
          
          
        
        
          
          <div class="site-section" id="note">
              <div class="container">
                <div class="row  justify-content-center" style="margin-left:230px">
                  <div class="col-lg-10 text center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title"  style="color:white;margin-left: 90px;">Ajouter Notes</h2>
                    
                    <div class="col-lg-8 " style="background-color:#f9bb09" >
                      <form action="result.php" method="post" class="form-box" style="background-color:#f9bb09" >
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" style="color:noire; font-weight: 900; font-size: 20px" class="form-label">Classe</label>
                          <!-- <input type="text" class="form-control"  name="id_classe" placeholder="classe"/> -->
                          
                          <select name="classe" class="form-control"  aria-label="Default select example">
                          
                            <option selected>Select...</option>
                            <?php
                                $req = $db->query("SELECT * FROM classe");
                                while ($data = $req->fetch()) {
                                  
                              ?>
                            <option value="<?= $data['id']; ?>"><?= $data['Niveau']; ?></option>
                            <?php 
                                }
                                $req->closeCursor();
                            ?>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" style="color:noire; font-weight: 900; font-size: 20px" class="form-label">Nom Etudiant</label>
                          <select name="etudiant" class="form-control"  aria-label="Default select example">
                          
                            <option selected>Select...</option>
                            <?php
                                $req = $db->query("SELECT * FROM utilisateur WHERE type = 'Etudiant'");
                                while ($data = $req->fetch()) {
                                  
                              ?>
                            <option value="<?= $data['id']; ?>"><?php echo $data['prenom'] ." " . $data['nom']; ?></option>
                            <?php 
                                }
                                $req->closeCursor();
                            ?>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" style="color:noire; font-weight: 900; font-size: 20px" class="form-label">Semestre</label>
                        <select id="S" name="semestre" class="form-control"  aria-label="Default select example">
                          <option selected>Semestre</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" style="color:noire; font-weight: 900; font-size: 20px" class="form-label">Module</label>
                          <select name="module" class="form-control"  aria-label="Default select example">
                          
                            <option selected>Select...</option>
                            <?php
                                $req = $db->query("SELECT * FROM module");
                                while ($data = $req->fetch()) {
                                  
                              ?>
                            <option value="<?= $data['id']; ?>"><?= $data['nomec']; ?></option>
                            <?php 
                                }
                                $req->closeCursor();
                            ?>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" style="color:noire; font-weight: 900; font-size: 20px" class="form-label">Note</label>
                          <input type="number" class="form-control"  name="moyenne" placeholder="note">
                        </div>
                        <input type="submit" style="margin-left:170px"name="save"class="btn btn-dark" value="Valider">
                      </form>
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
        

  
  
  

  
    
  </body>
</html>