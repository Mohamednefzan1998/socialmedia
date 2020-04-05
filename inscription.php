<?php
session_start();
include error_reporting(0);
$connect=mysqli_connect("localhost","root","","social");

if (isset($_POST['connexion'])) {
	
		$userc=$_POST['userc'];
	    $passc=$_POST['passc'];
     if (!empty($userc) and !empty($passc)) {
     	# code...
     
     $query="SELECT * FROM users WHERE username='$userc' AND pass='$passc'";
     $result=mysqli_query($connect,$query);
     if(mysqli_num_rows($result) > 0){
         $row=mysqli_fetch_assoc($result);

     	$_SESSION['email']=$row['email'];
     	$_SESSION['username']=$row['username'];
     	$_SESSION['image']=$row['image'];
     	$_SESSION['id']=$row['id']; 
     	echo $row['id'];
     	header("Location: homepage.php");         	
     }else{
     	$connecterror="Utilisateur Non Trouve";
     }
  }else{
  	     	$connecterror="Tous Les Champs Sont Obligatoires";

  }


}	

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script>
		<script src="https://kit.fontawesome.com/66342e47f8.js"></script>
<style type="text/css">
	.tab-box{
		padding: 20px;
    	border: 1px solid #DDD;
    	border-top: 0;
	}
	.tab-box > h3{
		margin:20px 0;
		font-style:italic;
	}
	.tab-box > p{
		line-height: 2;
		color: #919191;
}


	}
</style>
<style>
	#show{cursor: pointer;}
	#head{width: 100%;height: 50px;background: white}
	#sm{line-height: 50px;margin-left: 20px;float: left;}
	#cons{float:right;}
	#cons a{display: inline-block;line-height: 50px;width: 80px;font-size: 14px;}
</style>
</head>

<body class="bg-light">
	<div id="head">
		<h4 id="sm">Social Media</h4>
		<div id="cons">
			
				<a href="inscription.php">Connexion</a>
				<a href="inscription.php">Contact</a>
		</div>
	</div>
	<div class="container mt-5">
		<div class="form-row">
			<div class="col-md-5">
				<img src="images/tech.png" class="img-fluid">
			</div>
			<div class="col-md-2"></div>
		 <div class="col-md-5 mt-3 mb-2">
	<ul class="nav nav-tabs">
	    <li class="nav-item">
	      <a style="color: #000" href="#tab1" class="nav-link navbar-default active" data-toggle="tab">Connexion</a>
	    </li>
	    <li class="nav-item">
	      <a style="color: #000" href="#tab2" class="nav-link navbar-default" data-toggle="tab">Inscription</a>
	    </li>
	   
  	</ul>
    
     	

	  <div class="tab-content" style="background: white">
	    <div id="tab1" class="tab-pane active tab-box">
	     <div class="md-form">
                        <form method="POST" >

           	<input type="text"  name="userc" class="form-control <?php echo $e?>"  >
           	<label for="userc">Username</label>

  		</div>

  		 <div class="md-form">
			 
			 	<input  type="password"  name="passc" class="form-control <?php echo $m?>" id="pass" >
            <label for="pass">Mot De Passe</label>
			 	
			 	<span class="mt-1" style="margin-top: -5px;margin-left: 4px;font-size: 14px;padding-top: 5px;color:black" id="show" onclick="s()">Show</span>
			 	<div class="custom-control custom-checkbox ml-4 mt-1 mb-3">
        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
    <label class="custom-control-label" for="defaultUnchecked" style="cursor: pointer;color: black">Remember Me</label>
     </div>
           <small><a href="">Mot De Passe Oublier ?</a></small>
			 	<button class="btn btn-info w-100 mt-2 mb-2" type="submit" name="connexion">Connexion</button><br>
               <small style="color: red"><?php echo $connecterror?></small>
        		</div>
        		</form>

	    </div>
	    <div id="tab2" class="tab-pane tab-box">
	   <form method="POST" enctype="multipart/form-data" class="frm">
        		<div class="md-form">
		<input type="text"  id="username"  name="username" value="<?php echo $nom?>" class="form-control <?php echo $nerror?>" >
		<label for="username">Username</label>
		<small><?php echo $nmsg?></small>
        	</div>
        	
	
	    <div class="md-form">
		<input type="text"  id="email"  name="email"  value="<?php echo $email?>"  class="form-control <?php echo $eerror?>" value="<?php echo $row['nom']?>">
		<label for="email">Email</label>
		<small><?php echo $emsg?></small>
	    </div>
		
           <div class="md-form">
		<input type="password"  id="pass"  name="pass" class="form-control <?php echo $perror?>" >
		<label for="pass">Mot De Passe</label>
		<small><?php echo $pmsg?></small>
           </div>
	
        <div class="md-form">
		<input type="password"  id="cpass"  name="cpass" class="form-control <?php echo $cperror?>" >
		<label for="cpass">Confimer Mot De Passe</label>
		<small><?php echo $cpmsg?></small>
	
        </div>
	
        
		
        <div class="form-group">
		<input id="ime" style="display: none;" type="file"   name="image" class="form-control <?php echo $ierror?>" >
		<label for="ime" style="height: 36px;width: 100%;background-color: white;color: black;text-align: center;border-radius: 5px;border: 1px solid"> <span style="line-height: 36px"> Choisir Image </span> <i  class="fas fa-file-image mr-1"></i></label>
		<small><?php echo $imsg?></small>
	
        </div>
	   	
	
	<button class="btn btn-success w-100" type="submit" name="inscription">Inscription</button>
	<small id="er" ></small>
	</form>
	    </div>
	         </div>
	         </div>
	  </div>
	</div>
	</div>
	<div style="margin-top: 250px">
			<?php
    include 'footer.php';
	?>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>
	var pass=document.getElementById('pass');
	var show=document.getElementById('show');
	var hide=document.getElementById('hide');
	function s(){
		  if (pass.type=="password") {
        	pass.type="text";
        	show.innerHTML="hide";
        

        }else{
        	pass.type="password";
        		show.innerHTML="show";
       



        }
	}



 	$(document).ready(function(){	
   $(".frm").on('submit',function(e){
      	e.preventDefault();
      $.ajax({
        url:'ajax/inscription.ajax.php',
        type:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data){
        	/*if (data==true) {
         	$('.frm')[0].reset();
        	}else{
        		alert("error D'inscription");

        	}*/ 
               $("#er").text(data);

        	if (data) {

        		     $('.frm')[0].reset();

        	}
        	  

            
          
        			
        }
      });
   
      }); 
      
	});
</script>
</body>
</html>