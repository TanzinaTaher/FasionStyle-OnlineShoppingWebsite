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
<body >

	<!-- Header Section -->

<nav class="navbar fixed-top navbar-expand-lg navbar-warning bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar scroll</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="MainPage 2.php">Designs</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Edit</a></li>
              <li><a class="dropdown-item" href="Admin_Customer.php">Customer</a></li>
              <li><a class="dropdown-item" href="Admin_fashion_images_edit_delete.php">Fashion Images</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../Login.php" tabindex="-1" aria-disabled="false">LogOut</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<br><br>

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
				<th>Image</th>
				<th>Price</th>
				<th>Description</th>
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
				<td> <img width="100" height="90" src="../uploads/<?=$images['image_url']?>"></td>
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