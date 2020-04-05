<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

include 'head.php';

?>
<style>
	.cinv{height: 400px;overflow-y: scroll;background: white}
	.cinv::-webkit-scrollbar {
    width: 10px;
}
 
.cinv::-webkit-scrollbar-track {
    background-color: #ebebeb;
    -webkit-border-radius: 10px;
    border-radius: 10px;
}

.cinv::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: #6d6d6d; 
}
</style>
<div class="container mt-5">
	<div class="col-md-5 m-auto">
		<div class="cinv">
			<table class="table ">
				
			   <?php
			   if (!empty($_GET['id'])) {
			    $id=filter_var($_GET['id'],FILTER_VALIDATE_INT);
			   }
			    $ginvitationcount=mysqli_query($connect,"SELECT g.nom,gi.timess,gi.user_to,gi.user_from,gi.id AS invgid , u.username,u.image FROM groupe g,groupeinvitation gi,users u WHERE gi.user_to='$i' AND u.id=gi.user_from AND g.id=gi.groupe_id ORDER BY gi.timess LIMIT 5");
          $countg=mysqli_num_rows($ginvitationcount);

        

          while ($rown=mysqli_fetch_assoc($ginvitationcount)) {      
                // $u1=$rown['user_id1'];
              // $checkgroupemembre=mysqli_query($connect,"SELECT * FROM friends WHERE user_id1='$i' AND user_id2= '$u1' OR //user_id1='$u1' AND user_id2= '$i' ");
           //if (!mysqli_num_rows($checkgroupemembre)>0) {
           
          ?>
          <div >
  
           <tr class="supp<?php echo $rown['invgid']?>">
                <td><img id="invimg" src="userimage/<?php echo $rown['image']?>"></td>
                <td><span class="invtxt"><?php echo  $rown['username'] ?> Ve Rejoindre <?php echo $rown['nom']?></span> </td>
                <td>  
                   <input type="hidden" class="user_1" value="<?php echo $_SESSION['id']?>">
                   <input type="hidden" class="idg" value="<?php echo $rown['invgid']?>">
                    <input type="hidden" class="user_2" value="<?php echo $rown['user_from']?>">
                  <button id="acceptff"   class="btn btn-success btnc">A</button>
                   <button onclick="supprimerinvitation(<?php echo $rown['invgid']?>)" class="btn btn-danger" id="deletef">D</button>
                	<label for="acceptff" data-toggle="tooltip" title="Accepter"><i class="fas fa-user-check mt-2 ai"></i>
                  </label>  <label for="deletef"  data-toggle="tooltip" title="Supprimer"><i class="fas fa-trash di"></i></label>
                  <div id="fr">
                    
                  </div>
                  </td>

              </tr>                       
          </div>

              <?php
                 //}
               }
              ?>
          	</table>
		</div>
	</div>
</div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    
      function supprimerinvitation(id){
        $.ajax({
                url:'ajax/supprimergroupeinvitation.ajax.php',
                  type:'POST',
                  data:{id:id},
                  success:function(data){
          	        $(".supp"+id).hide();

          

                  }
           });
    
  
  }

     $(document).ready(function(){ 
   $(".btnc").on('click',function(e){
    var user_1=$(".user_1").val();
    var user_2=$(".user_2").val();
      $.ajax({
        url:'ajax/ajouterfriend.ajax.php',
        type:'POST',
        data:{user_1:user_1,user_2:user_2},
        
        success:function(data){
               $("#fr").html(data);

       
                                
        }
      });
   
      }); 
      
  });
</script>
</body>
</html>