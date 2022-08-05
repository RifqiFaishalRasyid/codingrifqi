<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/signin.css"/>
	<style type="text/css">
		#main {
			background-image: url('Background.jpg');
			height: 720px;
			width: 1024px;
		}
	</style>
</head>
 <body class="text-center");>
 	<div id="main"></div>
    <form class="form-signin" action="cek_login.php" method="POST">
	    <img class="mb-4" src="logosma.jpg" alt="" width="150" height="150">
	    <h1 class="h3 mb-3 font-weight-normal" style="font-family:arial-narrow;">SILAHKAN MASUK</h1>
	    <input type="text" name="txtUser" class="form-control" placeholder="Username" required="required" autofocus="autofocus"/>
	    <input type="password" name="txtPass" class="form-control" placeholder="Password" required="required"/>
	    <select name="txtLevel" class="form-control custom-select" id="level">
			<option value="">Pilih</option>
			<option value="admin">Admin</option>
	    <div class="checkbox mb-3">
	    <label>
          		<input type="checkbox" value="remember-me"> Remember me
       	 </label>
      </div>
  </br></br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </body>
</html>