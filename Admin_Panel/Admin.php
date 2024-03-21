<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Admin_style.css">
	<!--  Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Admin Image Upload</title>






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



	<div class="MainDiv">

		<?php 
			if (isset($_GET['error'])):
		?>
		<p><?php echo $_GET['error']; ?></p>
		<?php endif ?>




		<!-- Input type -->

		<div class="container-fluid">
			
			<div class="card shadow mb-4">

				<div class="card-header py-3">

					<h6 class="m-0 font-weight-bold text-primary">Insert Images</h6>
					
				</div>
				<div class="card-body">


				    <form action="Admin.php" method="post" enctype="multipart/form-data">

				    	<div class="form-group">
				    		<input type="text" name="Name" placeholder="Name" class="form-control">
							<br>				    		
				    	</div>
				    	<div class="form-group">
							<input class="form-control" type="text" name="Price" placeholder="Price">
							<br>			    		
				    	</div>
				    	<div class="form-group">
							<input class="form-control" type="text" name="Description" placeholder="Description">
							<br>			    		
				    	</div>
				    	<div class="form-group">
							<input class="form-control" type="file" name="my_image" placeholder="files">
							<br>			    		
				    	</div>
				      	<div class="form-group">
				    		<select class="form-control btn-warning" name="image_type"> 
				    			<option value="Kurti">Kurti</option>
				    			<option value="Panjabi">Panjabi</option>
				    			<option value="Shirt">Shirt</option>
				    			<option value="Pant">Pant</option>
				    			<option value="Suit">Suit</option>
				    			<option value="Salwar">Salwar</option>
				    			<option value="Sharee">Sharee</option>
				    			<option value="Westren">Westren</option>
				    		</select>
				    	</div>
				    	<br><br>

				    	<div class="form-group">
							<input class="form-control btn btn-danger" type="submit" name="submit" placeholder="Upload">
							<br><br>			    		
				    	</div>
				    	<div class="form-group">
				    		<input class="form-control btn btn-info" type="submit" name="admin_go" value="Goto_Login" class="login_btn">
				    	</div>


						
		            </form>

					
				</div>
				
			</div>

		</div>

		<!-- Input type ends -->

		<?php

		error_reporting(0);


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


			if(isset($_POST['submit']) && isset($_FILES['my_image']))
			{


				$img_name = $FILES['my_image']['name'];
				$img_size = $FILES['my_image']['size'];
				$tmp_name = $FILES['my_image']['tmp_name'];
				$error = $FILES['my_image']['error'];



				$name = $_POST['Name'];
				$price = $_POST['Price'];
				$description = $_POST['Description'];
				$image_type = $_POST['image_type'];

				echo  $_FILES['my_image']['name'];
				echo "<br>";
				echo $_FILES['my_image']['tmp_name'];
				echo "<br>";
				echo $_FILES['my_image']['size'];
				echo "<br>";
				echo $_FILES['my_image']['error'];
				echo "<br>";


				if($error>=0)
				{
					if($img_size > 170000)
					{
						echo "Size exceed";
					}
					else
					{
						
						$img_ex = pathinfo($_FILES['my_image']['name'],PATHINFO_EXTENSION);
						echo "<br>";
						echo $img_ex;
						$img_ex_lc = strtolower($img_ex);

						$allowed_exs = array("jpg","png","jpeg");

						if(in_array($img_ex_lc, $allowed_exs))
						{
							$new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
							$img_upload_path = '../uploads/'.$new_img_name;

							move_uploaded_file($_FILES['my_image']['tmp_name'], $img_upload_path);

							//Insert to Database

							$sql = "INSERT INTO fashion_images(Name,image_url,Price,Description,image_type) VALUES('$name','$new_img_name','$price','$description','$image_type')";

							if (mysqli_query($conn, $sql)) 
							{
								echo "Record saved";
								header('Location:../MainPage.php');
							}
							else
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
							mysqli_close($conn);


						}
						else
						{
							echo "NOT ALLOWED EXS!!";
						}
					}
				}

			}
			else
			{
				echo "ASDASASADSDSD";
			}


			if(isset($_POST['admin_go']))
			{
				header('Location:../Login.php');
			}
			
		?>

	</div>


	<?php 
	/*
			error_reporting(0);

			if (isset($_POST['submit']))
			{
				echo "<pre>";
				print_r($_FILES['my_image']);
				echo "<pre>";

				$img_name = $FILES['my_image']['name'];
				$img_size = $FILES['my_image']['size'];
				$tmp_name = $FILES['my_image']['tmp_name'];
				$error = $FILES['my_image']['error'];

				echo $FILES['my_image']['name'];
				echo $tmp_name = $FILES['my_image']['tmp_name'];

			if($error === 0)
				{
					if($img_size>170000)
					{
						echo "Sorry,your file is too large!";
						
					}
					else
					{
						echo $img_name."NOT MORE THEN 1.7MB";
						echo($img_name);
						$img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
						echo($img_ex);
					}
				}
				else
				{
					echo "Unknown error occured";
					
				}
			}
			else
			{
				echo "NOT SET ALL";
			}*/

	 ?>
	


</body>
</html>