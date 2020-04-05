<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");

$id=$_POST['id'];


$sql=mysqli_query($connect,"DELETE FROM groupeinvitation WHERE id='$id'");
echo "<script>Swal.fire({
  icon: 'success',
  text: 'Supprimer Avec Success!',
})</script>";
?>