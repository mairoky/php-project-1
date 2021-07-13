<?php 

session_start();

if (isset($_SESSION['auth'])) {
	if($_SESSION['auth'] == 1) {
		header("location:index.php");
	}
}

$notify = null;

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$checkbox = isset($_POST['checkbox'])?1:0;





	if ($email == "a@gmail.com" && $pass == "1234") {
		$_SESSION['auth'] = 1;
		header("location:index.php");
	} else {
		$notify = "Invalid Email & Password";
	}

}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="mairoky">
    <!-- title -->
    <title>Login Form</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="container">
        <div class="row pt-5">
            <div class="mx-auto col-lg-5 mb-5 pt-5">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				  <div class="mb-3">
				    <label for="email" class="form-label">Email</label>
				    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
				    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				  </div>
				  <div class="mb-3">
				    <label for="password" class="form-label">Password</label>
				    <input type="password" name="password" class="form-control" id="password">
				  </div>
				  <div class="mb-3 form-check">
				    <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
				    <label class="form-check-label" for="checkbox">Check me out</label>
				  </div>
				  <button type="submit" name="login" class="btn btn-primary">Login</button>
				</form>

				<div>
					<p class="mt-2"><strong><?php echo $notify; ?></strong></p>
				</div>
            </div>
        </div>
    </div>









    <!-- popper, bootstrap js -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>