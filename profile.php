<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>
	<style>
		#pi{height: 100px;width: 100px;border-radius: 50%}
		.ma:hover{transform: scale(1.1);cursor: pointer;}
	</style>
<?php
include 'head.php'
?>

<div class="container">
	<div class="col-md-4 mt-5 ml-2">
		<img  id="pi" src="userimage/<?php echo $_SESSION['image']?>">
		<h4 class="mt-2"><i class="fas fa-user mr-1"></i><?php echo $_SESSION['username']?></h4>
		<a href="#" style="display: none;" id="mm">dfsd</a>
		<h6><i class="fas fa-envelope mr-1 ma"></i><?php echo $_SESSION['email']?></h6>
		<a href="">Modifier Mes Information</a>
	</div>


	    <div>
	    	<?php
            include 'ajouterpost.php';
	    	?>
	    </div>

</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>
</html>