<?php
require 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Beranda</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<style type="text/css">
		body
		{
			padding-top: 3px;
			background-image: url('Background2.jpg');
			height: 1164px;
			width: 1500px;
		
		}
	</style>
</head>
<body>
	<?php require 'nav.php'; ?>
	</br>
	<h1><marquee style="font-family:arial-narrow;">SELAMAT DATANG</marquee></h1>
	<div class="container">
		<?php 
			if (isset($_GET['page']))
			{
				$page = isset($_GET['page']) ? $_GET['page'] : "";

				if ($page == 'jurusan')
				{
					require 'content/jurusan.php';
				}
				elseif ($page == 'kelas')
				{
					require 'content/kelas.php';
				}
				elseif ($page == 'walikelas')
				{
					require 'content/walikelas.php';
				}
				else
				{
					echo '<h2>File Tidak Tersedia di Folder Content</h2>';
				}
			}
		?>
	</div>


	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>