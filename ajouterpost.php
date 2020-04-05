<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="shortcut icon" type="image/x-icon" href="logo/logo.ico" />






		<script src="https://kit.fontawesome.com/66342e47f8.js"></script>
</head>
<body>
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

</style><div class="container">
	<div style="display: none;">
		
	</div>
	<div class="mt-5 ml-2">
	     	
		<div class="col-md-7 m-auto">
			
	<ul class="nav nav-tabs ">
	    <li class="nav-item">
	      <a href="#tab1" class="nav-link navbar-default active text-primary " data-toggle="tab">Text</a>
	    </li>
	    <li class="nav-item ">
	      <a href="#tab2" class="nav-link navbar-default text-primary" data-toggle="tab">Pdf</a>
	    </li>
	    <li class="nav-item">
	      <a href="#tab3" class="nav-link navbar-default text-primary" data-toggle="tab">Mp3/Mp4</a>
	    </li>
	   
  	</ul>
  
	  <div class="tab-content" style="background: white">
	    <div id="tab1" class="tab-pane active tab-box">
	      
	      <div class="form-group">
	      	<form method="POST" class="frm1">
	      	 <label>Enter Votre Post</label>
	      	 <textarea class="form-control w-100" name="content">
	      	 	
	      	 </textarea>

	      </div>

	      <button class="btn btn-info w-100 mt-2" type="submit" >Poster</button> 
	      <small class="mt-2" id="er1"></small>
         </form>
	    </div>
	    <div id="tab2" class="tab-pane tab-box">
	       <div class="form-group">
	       		    	<form method="POST" enctype="multipart/form-data" class="frm2">

	      	<input type="text" name="titrepdf" placeholder="Enter Titre Pdf" class="form-control mt-1">
<input id="imr" style="display: none;" type="file"   name="pdf" class="form-control <?php echo $ierror?>" >
		<label class="mt-2" for="imr" style="height: 36px;width: 100%;background-color: white;color: black;text-align: center;border-radius: 5px;border: 1px solid"> <span style="line-height: 36px"> Choisir Image </span> <i  class="fas fa-file-image mr-1"></i></label>	      
			<input type="text" name="descpdf" placeholder="Enter Description Pdf" class="form-control mt-1">

	      </div>

	      <button class="btn btn-info w-100 mt-2" type="submit">Poster</button>
	      <small class="mt-2" id="er2"></small>

	      </form> 
	    </div>
	    <div id="tab3" class="tab-pane tab-box">
	        <div class="form-group">
	        	<form method="POST" enctype="multipart/form-data" class="frm3">
	      	<input type="text" name="titremp" placeholder="Enter Titre Mp3/Mp4" class="form-control mt-1">

<input id="imes" style="display: none;" type="file"   name="fichier" class="form-control <?php echo $ierror?>" >
		<label class="mt-2" for="imes" style="height: 36px;width: 100%;background-color: white;color: black;text-align: center;border-radius: 5px;border: 1px solid"> <span style="line-height: 36px"> Choisir Image </span> <i  class="fas fa-file-image mr-1"></i></label>	      

			<input type="text" name="descmp" placeholder="Enter Description Mp3/Mp4" class="form-control mt-1">

	      </div>

	      <button class="btn btn-info w-100 mt-2" type="submit">Poster</button> 
	      <small class="mt-2" id="er3"></small>

	      </form>
	    </div>



	    
	  		</div>
  	     </div>
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>
	


 	$(document).ready(function(){	
   $(".frm1").on('submit',function(e){
      	e.preventDefault();
      $.ajax({
        url:'ajax/ajouterposttext.ajax.php',
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
               $("#er1").text(data);

        	if (data) {

        		     $('.frm1')[0].reset();

        	}
        	                			
        }
      });
   
      }); 
      
	});

		$(document).ready(function(){	
   $(".frm2").on('submit',function(e){
      	e.preventDefault();
      $.ajax({
        url:'ajax/ajouterpostpdf.ajax.php',
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
               $("#er1").text(data);
               console.log(data);

        	if (data) {

        		     $('.frm2')[0].reset();

        	}
        	                			
        }
      });
   
      }); 
      
	});

			$(document).ready(function(){	
   $(".frm3").on('submit',function(e){
      	e.preventDefault();
      $.ajax({
        url:'ajax/ajouterpostmp.ajax.php',
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
               $("#er1").text(data);

        	if (data) {

        		     $('.frm3')[0].reset();

        	}
        	                			
        }
      });
   
      }); 
      
	});

</script>
</body>
</html>