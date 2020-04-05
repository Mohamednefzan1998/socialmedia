
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<style>
	#cs{width: 300px;margin-bottom: 30px;position: relative;text-align: center;margin-top: 30px}
	#searchg{width: 300px}
	#searchshow{width: 300px;z-index: 999;background:#34495E;position: absolute;border-radius: 5px}
</style>
<body>
<?php
include 'head.php';
?>
<div class="container">
	<?php
       if (!empty($_GET['id'])) {
          $id=filter_var($_GET['id'],FILTER_VALIDATE_INT);
          $result=mysqli_query($connect,"SELECT * FROM groupe WHERE id='$id'");
          $row=mysqli_fetch_assoc($result);
       } 
	 ?>
	  <img style="height: 80px;width: 80px;border-radius: 50%;margin-top: 50px" src="groupeimage/<?php echo $row['image']?>" >
       
	  <h3>Groupe :<?php echo $row['nom']?></h3>

	 


<form class="frm" method="POST">
	  <input type="hidden"  name="user_to" value="<?php echo $ri=$row['user_id']?>">
	  <input type="hidden"  name="groupe_id" value="<?php echo $row['id']?>">
	  <input type="hidden"  name="user_from" value="<?php echo $_SESSION['id']?>">
	  <?php
         $check=mysqli_query($connect,"SELECT * FROM groupeinvitation WHERE user_from='$i' AND user_to='$ri' ");
        if (!mysqli_num_rows($check)>0) {
        	if ($row['user_id']!==$_SESSION['id']) {
        		# code...
        	
		?>
	  <button class="btn btn-sm btn-outline-primary" type="submit">Rejoingner +</button>
	  <?php
      }
     }
      else{
	  ?>
	  </form>
	<button class="btn btn-danger" id="sinv" style="display: none;" onclick="supprimerinvitation(<?php echo $row['user_id']?>)">sd</button>
			<input type="hidden" id="ids" value="<?php echo $row['user_id']?>">
			<input type="hidden" id="idg" value="<?php echo $row['id']?>">

			<label id="si" for="sinv"><i  class="fas fa-trash mr-2 text-danger"></i>Supprimer L'invitation</label>
   <?php
}
   ?>
	  <span id="rs"></span>
	  <?php
         
	  ?>
	   <div>



	     <div id="cs" >
	  	
	
  <input class="form-control" id="searchg" type="text" placeholder="Chercher Groupe "
    aria-label="Search"> 
 <div id="searchshow">
  	
  </div>
  </div>
  	


	   	<?php
         include 'ajouterpost.php';
	   	?>
	   </div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>			
	 $(document).ready(function(){ 
   $(".frm").on('submit',function(e){
        e.preventDefault();
      $.ajax({
        url:'ajax/groupeinvitation.ajax.php',
        type:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data){
      
               $("#rs").html(data);

          if (data) {

                 $('.frm')[0].reset();

          }
                                
        }
      });
   
      }); 
      
  });

	 	function supprimerinvitation(id){
	 		var idg=$("#idg").val();
	      $.ajax({
                url:'ajax/supprimergroupeinvitation.ajax.php',
                  type:'POST',
                  data:{ids:id,idg:idg},
                  success:function(data){
              $("#rs").html(data);

                  }
	         });
	  
	
	}

		$(document).ready(function(){
		$("#searchg").on('input',function(){
		var searchg=$("#searchg").val();
		if (searchg!=="") {
	      $.ajax({
                url:'ajax/groupesearch.ajax.php',
                  type:'POST',
                  data:{searchg:searchg},
                  success:function(data){
                  	console.log(data);
                  	$("#searchshow").html(data);
                  }
	});
	}else{
			$("#searchshow").html("");
	}
	});

			});


</script>
</body>
</html>