<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$nom=$_POST['groupe'];
$image=$_FILES['imageg']['name'];
$target="../groupeimage/".basename($_FILES['imageg']['name']);
$user_id=$_SESSION['id'];


  	$result=mysqli_query($connect,"INSERT INTO groupe (nom,image,user_id) VALUES ('$nom','$image','$user_id')");
  	move_uploaded_file($_FILES['imageg']['tmp_name'], $target);
  echo "Ajouter Avec Success";

 
   

  
?>