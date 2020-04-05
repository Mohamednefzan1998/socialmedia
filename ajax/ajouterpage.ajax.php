<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$nom=$_POST['page'];
$image=$_FILES['imagep']['name'];
$target="../pageimage/".basename($_FILES['imagep']['name']);
$user_id=$_SESSION['id'];


  	$result=mysqli_query($connect,"INSERT INTO page (nom,image,user_id) VALUES ('$nom','$image','$user_id')");
  	move_uploaded_file($_FILES['imagep']['tmp_name'], $target);
  echo "Ajouter Avec Success";

 
   

  
?>