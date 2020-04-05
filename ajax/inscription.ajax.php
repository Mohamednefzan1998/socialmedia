<?php
session_start();
include error_reporting(0);
$connect=mysqli_connect("localhost","root","","social");

$target="../userimage/".basename($_FILES['image']['name']);

		$username=mysqli_real_escape_string($connect,$_POST['username']);
	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$image=$_FILES['image']['name'];
	$pass=mysqli_real_escape_string($connect,$_POST['pass']);
	$cpass=mysqli_real_escape_string($connect,$_POST['cpass']);
	$check=getimagesize($_FILES['image']['tmp_name']);
      list($width,$height,$type,$attr)=$check;

$sqlcheck=mysqli_query($connect,"SELECT * FROM users WHERE email='$email'");

	if (!empty($username) and !empty($pass) and !empty($email) and !empty($cpass) and !empty($image) ) {
		
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		
		 echo 'email non valide';
	}
	else if($_FILES['image']['size']>5000000){
		 echo 'Image Ne doit Pas Depasser 5 Mo';
           
	}
	else if(mysqli_num_rows($sqlcheck)>0){
				 echo 'email deja existe';

	}
	else if($pass!==$cpass){
				 echo 'Les 2 Mot De Pass Doit etre Identique';
				

	}elseif(!preg_match("#[0-9]+#",$pass)) {
         echo "Votre Mot de Passe Doit Contenir une Lettre au moins!";
    }
    elseif(!preg_match("#[A-Z]+#",$pass)) {
        echo "Votre Mot de Passe Doit Contenir une Lettre Majiscule au moins!";
    }
    elseif(!preg_match("#[a-z]+#",$pass)) {
    	 echo 'is-invalid';

        echo "Votre Mot de Passe Doit Contenir une Lettre Miniscule au moins!";
    }else if (strlen($pass)<8) {
       echo "Votre Mot De Passe Doit Contenir 8 caracteres minimum!";

    }
    else if (strlen($username)>8) {
       echo "Username Ne Doit Pas Deppaser 8 caracteres!";

    }
	else
	{

	$sql=mysqli_query($connect,"INSERT INTO users(username,email,image,pass,cpass) VALUES ('$username','$email','$image','$pass','$cpass')");
	move_uploaded_file($_FILES['image']['tmp_name'], $target);
		echo "<script>Swal.fire({
  icon: 'success',
  text: 'Inscription Avec Success!',
})</script>";
    }
}

else
{
 
   echo " Tous Les Champs Obligatoires";
}




?>