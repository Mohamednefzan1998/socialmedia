<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$titre=$_POST['titremp'];
$desc=$_POST['descmp'];
$pdf=$_FILES['fichier']['name'];
$target="../postmp/".basename($_FILES['fichier']['name']);
$user_id=$_SESSION['id'];


  	$result=mysqli_query($connect,"INSERT INTO postmp (titre,fichier,description,user_id) VALUES ('$titre','$pdf','$desc','$user_id')");
  	move_uploaded_file($_FILES['fichier']['tmp_name'], $target);
  echo "Ajouter Avec Success";

 
   

  
?>