<?php
session_start();
  $bddPDO = new PDO('mysql:host=localhost;dbname=db_mark','root',"");

 
  $id= $_GET['id'];
  //requête de suppression
  $requete = $bddPDO->prepare("DELETE FROM note WHERE id = ?");
  $requete->execute(array($id));
  //redirection vers la page index.php
  header("Location:liste.php")
?>