<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");

$ids=$_POST['ids'];


$sql=mysqli_query($connect,"DELETE FROM userinvitation WHERE id='$ids'");
echo "<script>Swal.fire({
  icon: 'success',
  text: 'Supprimer Avec Success!',
})</script>";
?>