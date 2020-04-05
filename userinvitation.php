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
          $invitationcount=mysqli_query($connect,"SELECT ui.timess,ui.user_id2,ui.user_id1,ui.id AS invid , u.username,u.image FROM userinvitation ui,users u WHERE ui.user_id2='$i' AND u.id=ui.user_id1 ORDER BY ui.timess");
          $count=mysqli_num_rows($invitationcount);

          while ($rown=mysqli_fetch_assoc($invitationcount)) {      
                 $u1=$rown['user_id1'];
               $checkfriend=mysqli_query($connect,"SELECT * FROM friends WHERE user_id1='$i' AND user_id2= '$u1' OR user_id1='$u1' AND user_id2= '$i' ");
           if (!mysqli_num_rows($checkfriend)>0) {
           
          ?>
          <div  class="suppr<?php echo $rown['invid']?>">
  
           <tr>
                <td><img id="invimg" src="userimage/<?php echo $rown['image']?>"></td>
                <td><span class="invtxt"><?php echo  $rown['username'] ?> Vous A Envoyer Une Invitation</span> </td>
                <td>  
                   <input type="hidden" class="user_1" value="<?php echo $_SESSION['id']?>">
                    <input type="hidden" class="user_2" value="<?php echo $rown['user_id1']?>">
                  <button id="acceptff"   class="btn btn-success btnc">A</button>
                   <button onclick="supprimerinvitation(<?php echo $rown['invid']?>)" class="btn btn-danger" id="deletef">D</button>
                	<label for="acceptff" data-toggle="tooltip" title="Accepter"><i class="fas fa-user-check mt-2 ai"></i>
                  </label>  <label for="deletef"  data-toggle="tooltip" title="Supprimer"><i class="fas fa-trash di"></i></label>
                  <div id="fr">
                    
                  </div>
                  </td>

              </tr>                       
          </div>

              <?php
                 }
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
                url:'ajax/rejectuserinvitation.ajax.php',
                  type:'POST',
                  data:{ids:id},
                  success:function(data){
          	        $(".suppr"+id).hide();

              $("#r").html(data);

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