<?php 

// db connect
include "conn.php";

// data update
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];

	$update_sql = "UPDATE students SET name='$name', email='$email', gender=$gender, age=$age WHERE id = $id";
	if ($conn -> query($update_sql)) {
		header("location:../index.php");
	} else {
		die($conn -> error);
	}
}

// data select and show
if (isset($_GET['id'])) {

	$edit_id = $_GET['id'];
	$select_sql = "SELECT id, name, email, gender, age FROM students WHERE id = $edit_id";

	$select_query = $conn -> query($select_sql);
	if ($select_query -> num_rows > 0) {

		while ($f_data = $select_query -> fetch_assoc()) {
	
	
	


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="mairoky">

	<!-- title -->
	<title>Learn PHP</title>
	
	<!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- custom css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/media.css">
</head>
<body>

	<section class="data-edit">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<!-- form -->
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<h2 class="text-info">Edit your information:</h2>
						<!-- id -->
						<input type="hidden" value="<?php echo $f_data['id']; ?>" name="id">
						<!-- name -->
						<div class="mb-3">
						  <!-- <label for="name" class="form-label">Enter Your Name:</label> -->
						  <input type="text" value="<?php echo $f_data['name']; ?>" class="form-control name" id="name" name="name" required>
						</div>
						<!-- email -->
						<div class="mb-3">
						  <!-- <label for="email" class="form-label">Enter Your Email:</label> -->
						  <input type="email" value="<?php echo $f_data['email']; ?>" class="form-control email" id="email" name="email" required>
						</div>
						<!-- gender -->
						<div class="mb-3">
						  <label for="gender" class="form-label">Choose Your Gender:</label>
						  <select class="form-select gender" name="gender" id="gender">
						  	<option value="0" <?php if ($f_data['gender'] == 0) {echo "Selected";} ?> >Male</option>
						  	<option value="1" <?php if ($f_data['gender'] == 1) {echo "Selected";} ?> >Female</option>
						  </select>
						</div>
						<!-- age -->
						<div class="mb-3">
						  <!-- <label for="age" class="form-label">Enter Your Age:</label> -->
						  <input type="number" value="<?php echo $f_data['age'];  ?>" class="form-control age" id="age" name="age" required>
						</div>
						<!-- submit button -->
						<div class="mb-3">
							<button type="submit" class="btn btn-primary" name="update">Update</button>
							<!-- <button type="reset" class="btn btn-danger" name="reset">Reset</button> -->
						</div>
					</form>
					<!-- form -->
				</div>
			</div>
		</div>
		
	</section>


	<!-- popper, bootstrap js -->
	<script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- custom js -->
	<script src="../js/custom.js"></script>
	
</body>
</html>


<?php 

		}

	} else {
		header("location:../index.php");
	}

} else {
	header("location:../index.php");
}



?>