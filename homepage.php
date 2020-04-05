<!DOCTYPE html>
<html>
<head>
	<title>Home</title>


<style>
	#sideleft{min-height: 100vh;background: #FBFCFC;width: 10%;float: left;text-align: center;}
	#sideright{min-height: 100vh;background: #FBFCFC;width: 10%;float: right;text-align: center;}
	#headside1{width: 100%}
</style>
</head>
<body>
	<?php
       include 'head.php'
	 ?>

	   
	    
	    <div class="container">
	    	

	   <div>
	   	<?php
         include 'ajouterpost.php';
	   	?>
	   </div>

  	     <div>
  	     	<?php
             $connect=mysqli_connect("localhost","root","","social");
              
              $sql=mysqli_query($connnect,"SELECT * FROM postmp ");
              while ($row=mysqli_fetch_assoc($sql)) {
               
               echo $row['titre'];

              }
  	     	?>
  	     </div>
   	    </div>
   	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	
</body>
</html>