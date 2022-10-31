<?php
session_start();

$bddPDO = new PDO('mysql:host=localhost;dbname=db_mark','root',"");

$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo"Parfait";

if (isset($_POST['save'])) {
    // var_dump($_POST); die;
    $classe = $_POST['classe'];
    $etudiant = $_POST['etudiant'];
    $semestre = $_POST['semestre'];
    $module = $_POST['module'];
    $note = $_POST['moyenne'];

    if (!empty($classe) && !empty($etudiant) && !empty($semestre) && !empty($module) && !empty($note) ) {
        
        $requete = $bddPDO->prepare('INSERT INTO note (semestre, moyenne, id_ec, id_etudiant, id_classe) VALUES(?,?,?,?,?)');
        $exec = $requete->execute(array($semestre, $note, $module, $etudiant, $classe));

        if (!$exec) {
            
            echo "Un probleme est survenu lors de l'ajout de la note";
        }
        else {
            // echo"<script type=\"text/javascript\">alert('La note ajoutée avec succés')</script>";
            $_SESSION['success'] = "Note ajouté avec succès";
            header('Location: admin.php');
        }
    }
    else {
        echo"Tous les champs sont requis";
    }





}
