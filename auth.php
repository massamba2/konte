<?php
session_start();?>  
<?php

$host="localhost";
$user="root";
$password="";
$db="db_mark";

$data=mysqli_connect($host,$user,$password,$db);
if ($data===false) {
    die("connect error");
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
    $username=$_POST["username"];
    $password=$_POST["password"];
   

    $sql="select * from utilisateur where username='".$username."' AND password='".$password."'";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if ($row["type"]=="Etudiant") {

        $_SESSION["username"]=$username;
        $_SESSION["id"] = $row["id"];
        
        header("location:etudiant.php");
    }
    elseif ($row["type"]=="Administration") {

        $_SESSION["username"]=$username;
        
        header("location:admin.php");
    }

    else {
        echo"username or password incorrect";
    }
}




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <title>GPE&mdash; Connection</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/style.css">
    
  </head>   
<body  style="background-color:#313f96;">
	
<div class="container">
 	<div class="header">
 		<h1>Authentification</h1>
		<img src="images/supdeco.png" alt="">
 	</div>
 	<div class="main">
 		<form action="#" method="post">
            <span>
 				<i class="fa fa-user"></i>
 				<input type="text" placeholder="identifiant" name="username">
 			</span><br>
				
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="password" name="password">
 			</span><br>
			
            <div class="form-group">
                <button type="submit" class="btn btn-dark mb-3">Se connecter</button>
            </div>

        </form>
 	</div>
</div>
  
 
</body>
</html>