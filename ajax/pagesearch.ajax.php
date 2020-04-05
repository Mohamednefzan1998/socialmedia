<style>
	#if{height: 28px;width: 28px;border-radius: 50%}
	#ds{background-color: #34495E;color: white;}
	#nom{font-size: 15px;color: white}
	a{text-decoration: none;}
</style>
<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


if (isset($_POST['searchp'])) {

	$search=$_POST['searchp'];


	
	$sql=mysqli_query($connect,"SELECT * FROM page WHERE nom LIKE '%$search%' LIMIT 5");
	if (mysqli_num_rows($sql)) {
	
	 	# code...
	 
	

?>
<div id="ds">
	
	<table class="table table-hover table-borderless">
		<?php
	while ($row=mysqli_fetch_assoc($sql)) {
	 	 if ($row['id']!==$_SESSION['id']) {

   
?>
		<tr>
			<td><img id="if" src="./pageimage/<?php echo $row['image']?>">
				<a id="nom" href="page.php?id=<?php echo $row['id']?>" ><?php echo $row['nom']?>
		</a>
		</tr>
		<?php
     }
   }
 }

  else{
 	echo "<span style='color:white;'>Page Introuvable<span>";
      }
  
  }
	?>
	</table>
	
</div>
