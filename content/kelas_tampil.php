<?php

require '../connect.php';

$id   = $_POST['id'];
$sql  = "SELECT id, nama_kelas, jur_id, jum_siswa FROM kelas WHERE id = '$id'";
$res  = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

echo json_encode($data);