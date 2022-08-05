<?php

require '../connect.php';

$id   = $_POST['id'];
$sql  = "SELECT id,  nama_wali, nama_kelas, nama_jurusan, wal_id, jurwal_id FROM walikelas WHERE id = '$id'";
$res  = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

echo json_encode($data);