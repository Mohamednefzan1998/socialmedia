<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$titre=$_POST['titrepdf'];
$desc=$_POST['descpdf'];
$pdf=$_FILES['pdf']['name'];
$target="../postpdf/".basename($_FILES['pdf']['name']);
$user_id=$_SESSION['id'];


  	$result=mysqli_query($connect,"INSERT INTO postpdf (titre,fichier,description,user_id) VALUES ('$titre','$pdf','$desc','$user_id')");
  	move_uploaded_file($_FILES['pdf']['tmp_name'], $target);
  echo "Ajouter Avec Success";

 
   

  
?>