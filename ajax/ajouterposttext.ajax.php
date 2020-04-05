<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$content=$_POST['content'];
$user_id=$_SESSION['id'];

 $result=mysqli_query($connect,"INSERT INTO posttext (content,user_id) VALUES ('$content','$user_id')");
  echo "Ajouter Avec Success";
   

  
?>