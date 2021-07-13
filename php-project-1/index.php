<?php

session_start();

if (isset($_SESSION['auth'])) {
	if ($_SESSION['auth'] != 1) {
		header("location:login.php");
	}
} else {
	header("location:login.php");
}

// db connect
include "lib/conn.php";

$result = null;

// data insert
if (isset($_POST['submit'])) {
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$pass = md5($_POST['password']);
	$cpass = md5($_POST['c-password']);



	if ($pass == $cpass) {

		$insert_sql = "INSERT INTO students(name, email, gender, age, pass) VALUES ('$name', '$email', $gender, $age, '$pass')";

		if ($conn -> query($insert_sql)) {
			$result = "Data inserted successfully.";
		} else {
			die($conn -> error);
		}
		
	} else {
		$result = "Password not matched!";
	}

}

//data show
$select_sql = "SELECT * FROM students";

$result_sql = $conn -> query($select_sql);

// echo $result_sql -> num_rows;



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
	
	<!-- favicon -->


	<!-- google fonts -->


	<!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- custom css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/media.css">
</head>
<body>
	<!-- data collect -->
	<section class="data-collect">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<!-- form -->
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<h2 class="text-info">Submit your information:</h2>
						<!-- name -->
						<div class="mb-3">
						  <!-- <label for="name" class="form-label">Enter Your Name:</label> -->
						  <input type="text" class="form-control name" id="name" name="name" placeholder="Enter Name" required>
						</div>
						<!-- email -->
						<div class="mb-3">
						  <!-- <label for="email" class="form-label">Enter Your Email:</label> -->
						  <input type="email" class="form-control email" id="email" name="email" placeholder="Enter Email" required>
						</div>
						<!-- gender -->
						<div class="mb-3">
						  <label for="gender" class="form-label">Choose Your Gender:</label>
						  <select class="form-select gender" name="gender" id="gender">
						  	<option value="0">Male</option>
						  	<option value="1">Female</option>
						  </select>
						</div>
						<!-- age -->
						<div class="mb-3">
						  <!-- <label for="age" class="form-label">Enter Your Age:</label> -->
						  <input type="number" class="form-control age" id="age" name="age" placeholder="Enter Age" required>
						</div>

						<!-- password -->
						<div class="mb-3">
						  <!-- <label for="password" class="form-label">Enter Your Password:</label> -->
						  <input type="password" class="form-control password" id="password" name="password" placeholder="Enter Password" required>
						</div>
						<!-- confirm password -->
						<div class="mb-3">
						  <!-- <label for="c-password" class="form-label">Confirm Your Password:</label> -->
						  <input type="password" class="form-control c-password" id="c-password" name="c-password" placeholder="Re-enter Password" required>
						</div>

						<!-- submit button -->
						<div class="mb-3">
							<button type="submit" class="btn btn-primary" name="submit">Submit</button>
							<button type="reset" class="btn btn-danger" name="reset">Reset</button>
						</div>
					</form>
					<!-- form -->
				</div>
				<div class="col-lg-7">
					<?php echo $result; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- data show -->
	<section class="data-show">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-dark table-hover text-center">
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Action</th>
						</tr>
						<?php if ($result_sql -> num_rows > 0) { ?>
						<?php while ($f_data = $result_sql -> fetch_assoc()) { ?>
						<tr>
							<td><?php echo $f_data['name']; ?></td>
							<td><?php echo $f_data['email']; ?></td>
							<td><?php if ($f_data['gender'] == 0) { echo "Male"; } else { echo "Female"; } ?></td>
							<td><?php echo $f_data['age']; ?></td>
							<td>
								<a href="lib/edit.php?id=<?php echo $f_data['id']; ?>">Edit</a>
								<a href="lib/delete.php?id=<?php echo $f_data['id']; ?>">Delete</a>
							</td>
						</tr>
						<?php } ?>
						<?php } else { ?>
						<tr>
							<td colspan="5"><p class="mb-0">No Data Available</p></td>
						</tr>
						<?php } ?>
					</table>
					<div><a href="logout.php" class="btn btn-danger">Logout</a></div>


					
				</div>
			</div>
		</div>
		
	</section>




	<!-- popper, bootstrap js -->
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- custom js -->
	<script src="js/custom.js"></script>
	
</body>
</html>