<?php 

require 'connect.php'; 

try{
	$username = $_POST['txtUser'];
	$password = $_POST['txtPass'];
	$level	  = $_POST['txtLevel'];

	$cek = "SELECT * FROM login WHERE username ='$username' AND password ='$password' AND level ='$level'";
	$hasil = mysqli_query($conn, $cek);
	$data = mysqli_num_rows($hasil);

	if ($data > 0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['level'] 	  = $level;
		header('Location:index.php');
	}
	else
	{
		echo '<h3>DATA ANDA TIDAK VALID</h3>';
		echo '<a href="login.php">ULANGI</a>';
		exit();
	}

}catch (Exception $e) {
	die('ada kesalahan' . $conn->connect_error);
}

?>