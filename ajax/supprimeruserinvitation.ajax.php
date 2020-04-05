<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");

$ids=$_POST['ids'];
$iduser=$_SESSION['id'];


$sql=mysqli_query($connect,"DELETE FROM userinvitation WHERE user_id1='$iduser' AND user_id2='$ids'");
echo "<script>Swal.fire({
  icon: 'success',
  text: 'Supprimer Avec Success!',
})</script>";
?>