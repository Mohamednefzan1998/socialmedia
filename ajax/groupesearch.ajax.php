<style>
	#if{height: 28px;width: 28px;border-radius: 50%}
	#ds{background-color: #34495E;color: white;}
	#nom{font-size: 15px;color: white}
	a{text-decoration: none;}
</style>
<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


if (isset($_POST['searchg'])) {

	$search=$_POST['searchg'];


	
	$sql=mysqli_query($connect,"SELECT * FROM groupe WHERE nom LIKE '%$search%' LIMIT 5");
	if (mysqli_num_rows($sql)) {
	
	 	# code...
	 
	

?>
<div id="ds">
	
	<table class="table table-hover table-borderless">
		<?php
	while ($row=mysqli_fetch_assoc($sql)) {

   
?>
		<tr>
			<td><img id="if" src="./groupeimage/<?php echo $row['image']?>">
				<a id="nom" href="groupe.php?id=<?php echo $row['id']?>" ><?php echo $row['nom']?>
		</a>
		</tr>
		<?php
     
   }
 }

  else{
 	echo "<span style='color:white;'>Groupe Introuvable<span>";
      }
  
  }
	?>
	</table>
	
</div>
