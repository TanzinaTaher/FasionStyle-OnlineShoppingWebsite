<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="Admin_fashion_images_editdelete_style.css">

	<!--  Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title></title>




	<!-- Javascropt -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>
<body class="body">

	<!-- Header Section -->



	<section class="fixed">
		
		<nav class="nav-2">
		<div class="logo_icon">

			<div class="Welcome"><span class="change_welcome"><b>Welcome To Admin</b></span></div>
			
			<div class="logo">
				
				<img src="logo_1.png" width="70" height="40" class="logo_img" >
			</div>

			<div class="search">
			
				<img src="search.png" width="20" height="20" class="search">

			</div>

		</div>			
			
			<div class="ul_part">
				
				<ul>
					
					<li><a href="#">Home</a></li>
					<li><a href="#">Tables</a></li>
					<li><a href="#">Edit/Delete</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Aggregate</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#" type="sub">Log Out</a></li>

				</ul>

			</div>



		</nav>

	</section>



	<!-- Header Section Ends -->


	<!-- Table Section -->


	<div class="table-responsive">
			
	<?php

		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
		$dbname = "fashiondream"; 
		// Create connection 
		$conn = mysqli_connect($servername, $username, $password, $dbname); 
 		if (!$conn) 
		{ 
			die("Connection failed: " . mysqli_connect_error()); 
		} 
		else
		{
			echo "Succesfully connected";
		}



		$sql = "SELECT * FROM fashion_images";
		$result = mysqli_query($conn, $sql); 


	?>

	<table class="table table-bordered" id="edit_delete_table" width="100%" collspacing="0">

		<thead>
			
			<tr>
				
				<th>id</th>
				<th>Name</th>
				<th>Image Url</th>
				<th>Price</th>
				<th>Description</th>
				<th>Image Type</th>
				<th>Image Type</th>
			</tr>

		</thead>

		<tbody>
			
			<?php
				if (mysqli_num_rows($result) > 0) 
	     	{
		    	while ($images = mysqli_fetch_assoc($result)) 
		    	{
			?>

			<tr>
				
				<td><?php echo $images['id']; ?></td>
				<td><?php echo $images['Name']; ?></td>
				<td><?php echo $images['image_url']; ?></td>
				<td><?php echo $images['Price']; ?></td>
				<td><?php echo $images['Description']; ?></td>
				<td><?php echo $images['image_type']; ?></td>


				<td>

					<form action="Admin_fashion_images_Edit.php" method="post">
					
						<input type="hidden" name="edit_id" value="
							<?php
								echo $images['id'];
							?>">
						<button type="submit" class="btn btn-success" name="edit_btn">Edit</button>

					</form>

				</td>
				<td>

					<form method="post">
						<input type="hidden" name="delete_id" value="<?php echo $images['id']; ?>">
						<button type="submit" class="btn btn-danger" name="delete_btn">Delete</button>
					</form>

					
				</td>
			</tr>

			<?php 

					}

				}

			 ?>



			 	<?php

					$id = $_POST['delete_id'];

					if(isset($_POST['delete_btn']))
					{
						$sql = "DELETE from fashion_images where id ='$id' ";
						$result = mysqli_query($conn, $sql);
						if($result)
						{
							header('Location:Admin_fashion_images_edit_delete.php');
						}
						else
						{
							echo "Error Delation";
						}

					}

				?>


		</tbody>
		


	</table>


	</div>









</body>
</html>