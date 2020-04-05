<!DOCTYPE html>
<html>
<head>
	<title>UserProfile</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>
<body>
	<style>
		#pi{height: 100px;width: 100px;border-radius: 50%}
		.ma:hover{transform: scale(1.1);cursor: pointer;}
		.rn:hover{transform: scale(1.1);cursor: pointer;color: #3498DB}
		.rn{cursor: pointer;}
		#si{cursor: pointer;}
		#si:hover{color: red}
	</style>
<?php
include 'head.php';
?>
<?php
$connect=mysqli_connect("localhost","root","","social");

if (!empty($_GET['id'])) {
	
	$id=filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$session_id=$_SESSION['id'];
	$sql=mysqli_query($connect,"SELECT * FROM users WHERE id='$id'");
	$row=mysqli_fetch_assoc($sql);
}
?>
<div class="container">
	
	<div class="container">
	<div class="col-md-4 mt-5 ml-2">
		<img  id="pi" src="userimage/<?php echo $row['image']?>">
		<h4 class="mt-2"><i class="fas fa-user mr-2"></i><?php echo $row['username']?></h4>
		<a href="#" style="display: none;" id="mm">dfsd</a>
		<h6><i class="fas fa-envelope mr-2 ma"></i><?php echo $row['email']?></h6>
		<form  method="POST" class="frm">
		<input type="hidden" name="user_id1" value="<?php echo $_SESSION['id']?>">
		<input type="hidden" name="user_id2" value="<?php echo $u2=$row['id']?>">
		<?php
         $check=mysqli_query($connect,"SELECT * FROM userinvitation WHERE user_id1='$session_id' AND user_id2='$u2' ");
        if (!mysqli_num_rows($check)>0) {
       
		?>
		<button id="envf" style="display: none;" class="btn btn-sm btn-outline-success" type="submit">Envoyer Une Invitation</button>
		<label for="envf" data-toggle="tooltip" title="Envoyer Invitation"><i class="fas fa-user-plus ml-2 rn"></i> Envoyer Invitation</label>
        <?php
         }
        ?>
		</form>
		
	</div>
       <?php
       $checkf=mysqli_query($connect,"SELECT * FROM friends WHERE user_id1='$i' AND user_id2='$u2' OR user_id1='$u2' AND user_id2='$i'");
        if (mysqli_num_rows($check)>0) {
         if (!mysqli_num_rows($checkf)>0) {
        
		?>
		<button class="btn btn-danger" id="sinv" style="display: none;" onclick="supprimerinvitation(<?php echo $row['id']?>)">sd</button>
		<input type="hidden" id="ids" value="<?php echo $row['id']?>">
		<input type="hidden" id="iduser" value="<?php echo $_SESSION['id']?>">
		<label id="si" for="sinv"><i  class="fas fa-trash mr-2 text-danger"></i>Supprimer L'invitation</label>
	   <?php
          }else{
	   ?>
	   <span><i class="fas fa-check text-success mr-2 ml-4"></i>Vous Etes Des Amis</span><br>
<a class="btn btn-sm blue-gradient ml-4" data-toggle="tooltip" title="Message"><i class="fas fa-comment-dots"></i></a>
<button class="btn btn-sm btn-danger">Supprimer De Ma List Des Amis</button>
	   <?php
          }
      }
	   ?>
<span id="r"></span>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>
	


 	$(document).ready(function(){	
   $(".frm").on('submit',function(e){
      	e.preventDefault();
      $.ajax({
        url:'ajax/userinvitation.ajax.php',
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
           $("#r").html(data);
        	
        	                			
        }
      });
   
      }); 
      
	});

		function supprimerinvitation(id){
	      $.ajax({
                url:'ajax/supprimeruserinvitation.ajax.php',
                  type:'POST',
                  data:{ids:id},
                  success:function(data){
              $("#r").html(data);

                  }
	         });
	  
	
	}

</script>
</body>
</html>