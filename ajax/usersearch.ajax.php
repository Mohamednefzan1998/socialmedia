<style>
	#if{height: 28px;width: 28px;border-radius: 50%}
	#ds{background-color: #273746;color: white;}
	#nom{font-size: 15px;color: white}
	a{text-decoration: none;}
</style>
<?php
session_start();
$connect=mysqli_connect("localhost","root","","social");


if (isset($_POST['search'])) {

	$search=$_POST['search'];


	
	$sql=mysqli_query($connect,"SELECT * FROM users WHERE username LIKE '$search%' LIMIT 5");
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
			<td><img id="if" src="./userimage/<?php echo $row['image']?>">
				<a id="nom" href="user.php?id=<?php echo $row['id']?>" ><?php echo $row['username']?>
		</a>
		</tr>
		<?php
     }
   }
 }

  else{
 	echo "<span style='color:white;'>Etudiant Introuvable<span>";
      }
  
  }
	?>
	</table>
	
</div>
