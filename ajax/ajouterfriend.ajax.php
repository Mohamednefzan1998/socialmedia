<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$user_1=$_POST['user_1'];
$user_2=$_POST['user_2'];

 $result=mysqli_query($connect,"INSERT INTO friends (user_id1,user_id2) VALUES ('$user_1','$user_2')");
	echo "<script>Swal.fire({
  icon: 'success',
  text: 'Vous Etes Des Amis!',
})</script>";   

  
?>