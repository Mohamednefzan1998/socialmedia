<?php
session_start();
include error_reporting(0);
?>
<?php
$connect=mysqli_connect("localhost","root","","social");
$i=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</head>
<style>
  .invtxt{font-size: 13px;color: black;text-decoration: none;}
  #invimg{height:30px;width: 30px;border-radius: 50%}
  .di,.ai{font-size: 13px;margin-left: 4px;cursor: pointer;}
   #bar{float: left;margin-left: 20px;line-height: 40px;cursor: pointer;font-size: 20px;transition: 1s;}
   #bar:hover{color: #3498DB}
   #afficherplus{color: black;margin-left: 10px;}
   #side{height: 100vh;width: 20%;background: #F4F6F7;float: left;overflow-y: scroll;text-align: center;position: absolute;z-index: 999;display: none}
		body{margin: 0;padding: 0;background-color: #F0F3F4}
    #h{height: 40px;width: 10)%;background:white}
#acceptff,#deletef{display: none;}
#acceptf{color: green}
.gg{font-size: 13px;font-family: Tahoma}
button{border:none;}
      	#imr{height: 25px;width: 25px;border-radius: 50%;line-height: 30px;margin-right: 2px;margin-top: 8px}
      	.n:hover{color: #3498DB}
      	h3{line-height: 70px;font-family:  Bahnschrift;}
         #showv{width: 250px;float: left;height: 100px;position: absolute;z-index: 999;}
         ul li a{text-decoration: none;color: white;transition: 1s}
         #im{height: 30px;width: 30px;border-radius: 50%}
      	@media(max-width: 800px){
      		#search{width: 100%}
      		ul li {width: 100%}
      	}
		@media(max-width: 1150px){
      #side{display: none;width: 50%;position: absolute;z-index: 999}
      #invtxt{font-size: 12px}
      .dd{width: 280px}

    }
  #side::-webkit-scrollbar {
    width: 6px;

}
 
#side::-webkit-scrollbar-track {
    background-color: #17202A
    -webkit-border-radius: 10px;
    border-radius: 10px;
}

#side::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: #2E4053; 
}
		
	</style>
<body class="bg-light">

 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand as" href="homepage.php">SocialMedia</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    	 

    
      
     

     <?php
if (!empty($_SESSION['id'])) {
  # code...
 
?>

      <li class="nav-item dropdown">
        <?php
             $invitationcount=mysqli_query($connect,"SELECT ui.timess,ui.user_id2,ui.user_id1,ui.id AS invid , u.username,u.image FROM userinvitation ui,users u WHERE ui.user_id2='$i' AND u.id=ui.user_id1 ORDER BY ui.timess LIMIT 5");
          $count=mysqli_num_rows($invitationcount);
        ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>User Invitation<span class="badge badge-primary ml-1"><?php echo $count;?></span></span>
        </a>
        <div class="dropdown-menu dd" aria-labelledby="navbarDropdown" style="width: 360px">
         
            <?php
       
           
          while ($rown=mysqli_fetch_assoc($invitationcount)) {                        

          ?>
          <a class="dropdown-item" href="#">
            <table>
              <tr id="supprimerinv<?php echo $rown['invid']?>">
                <td><img id="invimg" src="userimage/<?php echo $rown['image']?>"></td>
                <td><a class="invtxt" href="userinvitation.php"><?php echo $rown['username']?> Vous A Envoyer Une Invitation</a> </td>
                <td>  
                  </td>
              </tr>
            </table>
 
             </a>
          <?php
          }
          ?>
          <a href="" id="afficherplus">Afficher Plus</a>
      </li> 


      <li class="nav-item dropdown">
        <?php
             $ginvitationcount=mysqli_query($connect,"SELECT g.nom,gi.timess,gi.user_to,gi.user_from,gi.id AS invgid , u.username,u.image FROM groupe g,groupeinvitation gi,users u WHERE gi.user_to='$i' AND u.id=gi.user_from AND g.id=gi.groupe_id ORDER BY gi.timess LIMIT 5");
          $countg=mysqli_num_rows($ginvitationcount);
        ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>Groupe Invitation<span class="badge badge-primary ml-1"><?php echo $countg;?></span></span>
        </a>
        <div class="dropdown-menu dd" aria-labelledby="navbarDropdown" style="width: 360px">
         
            <?php
       
           
          while ($rowg=mysqli_fetch_assoc($ginvitationcount)) {                        

          ?>
          <a class="dropdown-item" href="#">
            <table>
              <tr id="supprimerinv<?php echo $rown['invid']?>">
                <td><img id="invimg" src="userimage/<?php echo $rowg['image']?>"></td>
                <td><a class="invtxt" href="groupeinvitation.php?id=<?php echo $rowg['invgid']  ?>"><?php echo $rowg['username']?> Ve Rejoindre <?php echo $rowg['nom']?></a> </td>
                <td> 
                  </td>
              </tr>
            </table>
 
             </a>
          <?php
          }
          ?>
          <a href="" id="afficherplus">Afficher Plus</a>
      </li> 



     <li class="nav-item"> <img id="imr" src="userimage/<?php echo $_SESSION['image'];?>"></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inscription.php?logout">Deconnexion</a>
        </div>
      </li>
  
      
    </ul>
       <div style="width:250px">
      <input class="form-control mr-sm-2" autocomplete="off" type="search" id="search" placeholder="Search" aria-label="Search">
      <div id="showv">
      	
      </div>
      </div>
         <?php
        }
     ?>
  </div>
   <?php
       
     

       if (isset($_GET['logout'])) {

       	session_destroy();
       	header("Location: inscription.php");
       }

      ?>
</nav>

<div id="h">
  <span id="bar"><i class="fas fa-bars"></i></span>
</div>

<div id="side">
  <div style="height: 100%">
    

  <div style="height: 50%">
    
  <h4 class="mt-2">Groupes</h4>

  <h6>Mes Groupes</h6>
  <button data-toggle="modal" data-target="#mdg" class="badge badge-primary" href=""> Nouveau Groupe</button>
   <ul class="list-group mt-2">
     
   </ul>
   <?php
   $sqlgroupe=mysqli_query($connect,"SELECT * FROM groupe WHERE user_id='$i' LIMIT 6");
   while ($row=mysqli_fetch_assoc($sqlgroupe)) {
     
   
   ?>
   <li class="list-group-item">
    <table>
    <tr>
     <td>  <img  id="im" src="groupeimage/<?php echo $row['image']?>">  </td>
     <td>    <a  href="groupe.php?id=<?php echo $row['id']?>" class="text-dark gg"><?php echo $row['nom']?></a></td>
   </tr>
   </table>
  </li>
   <?php
      }
   ?>
  </ul>

  </div>

  <div style="height: 50%">
    
  <h4 class="mt-2">Pages</h4>

  <h6>Mes Pages</h6>
  <button data-toggle="modal" data-target="#mdp" class="badge badge-dark" href=""> Nouvelle Page</button>
   <ul class="list-group mt-2">
     
   </ul>
   <?php
   $sqlpage=mysqli_query($connect,"SELECT * FROM page WHERE user_id='$i' LIMIT 6");
   while ($rows=mysqli_fetch_assoc($sqlpage)) {
     
   
   ?>
   <li class="list-group-item">
     <table>
    <tr>
     <td>  <img  id="im" src="pageimage/<?php echo $rows['image']?>">  </td>
     <td>    <a href="page.php?id=<?php echo $rows['id']?>" class="text-dark gg"><?php echo $rows['nom']?></a></td>
   </tr>
   </table>
 
  </li>
   <?php
      }
   ?>
  </ul>
  </div>
  </div>

  
</div>

<div class="modal fade" id="mdg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4> Creer Un Groupe</h4>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" class="frmg">
          <div class="form-group">
            
        <textarea name="groupe" class="form-control">
          
        </textarea>
         </div>
         
         <div class="form-group">
           <input id="ime" style="display: none;" type="file"   name="imageg" class="form-control <?php echo $ierror?>" >
    <label for="ime" style="height: 36px;width: 100%;background-color: white;color: black;text-align: center;border-radius: 5px;border: 1px solid"> <span style="line-height: 36px"> Choisir Image </span> <i  class="fas fa-file-image mr-1"></i></label>
         </div>
        <button class="btn btn-info mt-2 w-100" type="submit">Ajouter Groupe</button>
        <small id="erg" class="mt-1"></small>

        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mdp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Creer Une Page</h4>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" class="frmp">
          <div class="form-group">
             <textarea name="page" class="form-control">
          
        </textarea>
          </div>
       
         <div class="form-group">
           <input id="imee" style="display: none;" type="file"   name="imagep" class="form-control <?php echo $ierror?>" >
    <label for="imee" style="height: 36px;width: 100%;background-color: white;color: black;text-align: center;border-radius: 5px;border: 1px solid"> <span style="line-height: 36px"> Choisir Image </span> <i  class="fas fa-file-image mr-1"></i></label>
         </div>
        <button class="btn btn-primary mt-2 w-100" type="submit">Ajouter Page</button>
        <small id="erp" class="mt-1"></small>
        </form>
      </div>
    </div>
  </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    
      function supprimerinvitation(id){
        $.ajax({
                url:'ajax/supprimeruserinvitation.ajax.php',
                  type:'POST',
                  data:{ids:id},
                  success:function(data){
              $("#r").html(data);
              $("supprimerinv"+id).hide();

                  }
           });
    
  
  }

		$(document).ready(function(){
		$("#search").on('input',function(){
		var search=$("#search").val();
		if (search!=="") {
	      $.ajax({
                url:'ajax/usersearch.ajax.php',
                  type:'POST',
                  data:{search:search},
                  success:function(data){
                  	$("#showv").html(data);
                  }
	});
	}else{
			$("#showv").html("");
	}
	});

			});
              var close =document.getElementById('close');
              var bar =document.getElementById('bar');

		$(document).ready(function(){
			$('#bar').click(function(){
              $("#side").animate({width: 'toggle'});
               
			});
		})

		
      $(document).ready(function(){ 
   $(".frmg").on('submit',function(e){
        e.preventDefault();
      $.ajax({
        url:'ajax/ajoutergroupe.ajax.php',
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
               $("#erg").text(data);

          if (data) {

                 $('.frmg')[0].reset();

          }
                                
        }
      });
   
      }); 
      
  });

         $(document).ready(function(){ 
   $(".frmp").on('submit',function(e){
        e.preventDefault();
      $.ajax({
        url:'ajax/ajouterpage.ajax.php',
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
               $("#erp").text(data);

          if (data) {

                 $('.frmp')[0].reset();


          }
                                
        }
      });
   
      }); 
      
  });
		
</script>
</body>
</html>