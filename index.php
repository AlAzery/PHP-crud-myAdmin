<?php 
session_start();
error_reporting(0);
include 'assets/functions.php';

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];
  
  // ambil berdsasarkan id
  $result = mysqli_query($conn,"SELECT username WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  
  if ( $key === hash('sha256', $row['username']) ) {
    $_SESSION['username'] = true;
  }
}

if (isset($_SESSION['username'])) {
    header("Location: assets/index.php");
    exit;
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		//rememberme
		if (isset($_POST["ingat"])) {
		  // buat cookie ny_a
		  
		  setcookie('cookie',$row['id'], time() + 60);
		  setcookie('key', hash('sha256', $row['username']), time() + 60);
		}
		
		$_SESSION['username'] = $row['username'];
		header("Location: assets/index.php");
	} else {
		echo "<script>alert('Opss Password atau username salah!')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-box">
				<input type="checkbox" name="ingat" id="ingat">
			 <label for="ingat">Remember me</label>
			</div>
			
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">belum punya akun<a href="register.php"> daftar</a>.</p>
		</form>
	</div>
</body>
</html>