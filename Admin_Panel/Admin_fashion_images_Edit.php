<!DOCTYPE html>
<html>
<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title></title>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<style type="text/css">
	
.body{
	padding: 0px;
	margin: 0px;
	
}

.nav-2{
	background: #2d3436;
	width: 100%;
	height: 80px;
	position: sticky;
}

.fixed{
	background: rgba(51,35,18,0,7);
	width: 100%;
	height: 80px;
	position: sticky;
	color: white;
	top: 0px;
}

.nav-2 .logo_img{

	margin-left: 80px;
	margin-top:20px;
}

.nav-2 .ul_part{
	position: absolute;
	left: 350px;
	top: 10px;
}
.nav-2 ul
{
	display: flex;
}
.nav-2 ul li{
	font-size: 20px;
	list-style: none;
	margin-left: 35px;
}
.nav-2 ul li a{
	padding-left: 20px;
	text-decoration: none;
	color: white;
}
.nav-2 ul li a:hover{
	color: red;
	border-bottom: 2px solid red;
}

.search{
	margin-top: 14px;
	margin-left: 450px;
}
.logo_icon{
	display: flex;
}
.Welcome{
	font-size: 20px;
	color: black;
	margin-top: 27px;
	margin-left: 100px;

	animation: change 2s infinite;
}

@keyframes change{
	0%{color: #fdcb6e;}
	25%{color: #fab1a0;}
	50%{color: #e17055;}
	75%{color: #d63031;}
	100%{color: #fd79a8;}
}


</style>


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




	<!-- FILE UPLOAD DATABASE FUNCTION -->
		<?php

			
		?>

		<!-- FILE UPLOAD DATABASE FUNCTION ENDS-->



	<!-- Edit Section Section -->

	<div class="container-fluid">
		
		<!-- database part -->

			<div class="card shadaw mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Edit Fashion Images Table
					</h6>	
				</div>
				<div class="card-body">
					
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

						$id  = $_POST['edit_id'];

						if(isset($_POST['edit_btn']))
						{

						$sql = "SELECT * FROM fashion_images where id='$id'";
						$result = mysqli_query($conn, $sql); 					


						foreach ($result as $images) {
							
					?>

			<form method="post">
				
					<input type="hidden" name="edit_id" value="<?php echo $images['id']; ?>">
					<div class="form-group">
						<label>Name :</label>
						<input type="text" name="edit_name" class="form-control" placeholder="Image_Name" value="
							<?php 
								echo $images['Name'];
							?>">
					</div>

					<div class="form-group">
						<label>Image_url :</label>
						<input type="text" name="edit_image_url" class="form-control" placeholder="Image_Url" value="
							<?php 
								echo $images['image_url'];
							?>">
							 <img width="255" height="200" src="../uploads/<?=$images['image_url']?>">
					</div>

					<div class="form-group">
						<label>Price :</label>
						<input type="text" name="edit_price" class="form-control" placeholder="Price" value="
							<?php 
								echo $images['Price'];
							?>">
					</div>

					<div class="form-group">
						<label>Description :</label>
						<input type="text" name="edit_description" class="form-control" placeholder="Description" value="
							<?php 
								echo $images['Description'];
							?>">
					</div>
					<br><br>

					<a href="Admin_fashion_images_edit_delete.php" class="btn btn-danger">Cancel</a>
					<button class="btn btn-primary" name="update_btn"> Update</button>



			</form>


					<?php

						}
					}

					?>


			<?php 



				if(isset($_POST['update_btn']))
				{
					/*
				echo "asdasdasdasdas";
				$img_name = $FILES['edit_image_url']['name'];
				$img_size = $FILES['edit_image_url']['size'];
				$tmp_name = $FILES['edit_image_url']['tmp_name'];
				$error = $FILES['edit_image_url']['error'];

				echo  $_FILES['edit_image_url']['name'];
				echo "<br>";
				echo $_FILES['edit_image_url']['tmp_name'];
				echo "<br>";
				echo $_FILES['edit_image_url']['size'];
				echo "<br>";
				echo $_FILES['edit_image_url']['error'];
				echo "<br>";
				echo "asdasdasdasdas111";

				if($error>=0)
				{
					if($img_size > 170000)
					{
						echo "Size exceed";
					}
					else
					{
						echo "asdasdasdasdas222";
						
						$img_ex = pathinfo($_FILES['edit_image_url']['name'],PATHINFO_EXTENSION);
						echo "<br>";
						echo $img_ex;echo $img_ex;
						$img_ex_lc = strtolower($img_ex);
						echo "asdasdasdasdas333".$img_ex;

						$allowed_exs = array("jpg","png","jpeg");
						echo $img_ex_lc;
						echo $img_ex_lc;
						echo $img_ex_lc;
						echo $img_ex_lc;

						if(in_array($img_ex_lc, $allowed_exs))
						{
							$new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
							$img_upload_path = '..../uploads/'.$new_img_name;

							echo "asdasdasdasdas444";

							move_uploaded_file($_FILES['edit_image_url']['tmp_name'], $img_upload_path);

							echo $new_img_name;
							echo $new_img_name;
							echo $new_img_name;

							
						}
						else
						{
							echo "NOT ALLOWED EXS!!";
						}
					}
				}


*/



						$id = $_POST['edit_id'];
						$Name = $_POST['edit_name'];
						$image_url = $_POST['edit_image_url'];
						$Price = $_POST['edit_price'];
						$Description = $_POST['edit_description'];


						$sql = "UPDATE fashion_images SET Name='$Name',image_url='$image_url',Price='$Price',Description='$Description' where id='$id'";

						$result = mysqli_query($conn, $sql);

						if($result)
						{
							header('Location:Admin_fashion_images_edit_delete.php');
						}
						else
						{
							echo "Error Updating Values";
						}


				}



			 ?>


				</div>
			</div>
	</div>










</body>
</html>