<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


$user_id1=$_POST['user_id1'];
$user_id2=$_POST['user_id2'];

    $check=mysqli_query($connect,"SELECT * FROM userinvitation WHERE user_id1='$user_id1' AND user_id2='$user_id2' OR  user_id1='$user_id2' AND user_id2='$user_id1'");
    if (mysqli_num_rows($check)>0) {

    	echo "<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Invitation Deja Envoyer!',
})</script>";
    }else{
  	$result=mysqli_query($connect,"INSERT INTO userinvitation (user_id1,user_id2) VALUES ('$user_id1','$user_id2')");
  	echo "<script>Swal.fire({
  icon: 'success',
  text: 'Envoyer Avec Success!',
})</script>";
  }

 
   

  
?>