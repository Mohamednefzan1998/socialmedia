<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$user_from=$_POST['user_from'];
$groupe_id=$_POST['groupe_id'];
$user_to=$_POST['user_to'];

    $check=mysqli_query($connect,"SELECT * FROM groupeinvitation WHERE user_from='$user_from' AND user_to='$user_to' OR  user_from='$user_to' AND user_to='$user_from' AND groupe_id='$groupe_id'");
    if (mysqli_num_rows($check)>0) {

    	echo "<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Invitation Deja Envoyer!',
})</script>";
    }else{
  	$result=mysqli_query($connect,"INSERT INTO groupeinvitation (user_from,user_to,groupe_id) VALUES ('$user_from','$user_to','$groupe_id')");
  	echo "<script>Swal.fire({
  icon: 'success',
  text: 'Envoyer Avec Success!',
})</script>";
  }

 
   

  
?>