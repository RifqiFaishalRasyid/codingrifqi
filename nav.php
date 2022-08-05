<?php
if (! isset($_SESSION['username']) AND ! isset($_SESSION['level'])): 
?>
	<h3>Anda Harus Login Untuk Mengakses Menu Ini</h3>
	<a href="login.php">LOGIN</a>

<?php
elseif ($_SESSION['level'] === 'admin'):
?>
	<nav  class="navbar navbar-light" style="background-color:blue">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="font-family:arial-narrow";><font color="white">Aplikasi Data Siswa</a></font>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav me-auto mb-2">
      	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false"><font color="white">Master Data</a></font>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="?page=jurusan">JURUSAN</a></li>
              <li><a class="dropdown-item" href="?page=kelas">KELAS</a></li>
              <li><a class="dropdown-item" href="?page=walikelas">WALI KELAS</a></li>
            </ul></br>
            <li><a class="btn btn-outline-success" href="logout.php"><font color="white">Logout</a></font></li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php
endif
?>