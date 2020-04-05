<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	#cs{width: 300px;margin-bottom: 30px;position: relative;text-align: center;margin-top: 30px}
	#searchp{width: 300px}
	#searchshows{width: 300px;z-index: 999;background:#34495E;position: absolute;border-radius: 5px}
</style>
<body>
<?php
include 'head.php';
?>
<div class="container">

	<?php
       if (!empty($_GET['id'])) {
          $id=filter_var($_GET['id'],FILTER_VALIDATE_INT);
          $result=mysqli_query($connect,"SELECT * FROM page WHERE id='$id'");
          $row=mysqli_fetch_assoc($result);
       } 
	 ?>
	  <img style="height: 80px;width: 80px;border-radius: 50%;margin-top: 50px" src="pageimage/<?php echo $row['image']?>" >
       
	  <h3>Page :<?php echo $row['nom']?></h3>
        
            <div id="cs" >
	  	
  <input class="form-control" id="searchp" type="text" placeholder="Chercher Page "
    aria-label="Search"> 
 <div id="searchshows">
  	
  </div>
  </div>

	   <div>
	   	<?php
         include 'ajouterpost.php';
	   	?>
	   </div>
</div>
</body>
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
		$("#searchp").on('input',function(){
		var searchp=$("#searchp").val();
		if (searchp!=="") {
	      $.ajax({
                url:'ajax/pagesearch.ajax.php',
                  type:'POST',
                  data:{searchp:searchp},
                  success:function(data){
                  	console.log(data);
                  	$("#searchshows").html(data);
                  }
	});
	}else{
			$("#searchshows").html("");
	}
	});

			});


</script>
</html>