<?php

require '../connect.php';
$errors = array();
$info 	= array();

if (empty($_POST['txtWal']))
		$errors['walas'] = "Nama Wali Kelas Belum DiIsi";

if (empty($_POST['txtNama']))
		$errors['nama'] = "Kelas Belum DiIsi";

if (empty($_POST['txtJur']))
		$errors['jurusan'] = "Jurusan Belum DiIsi";
	
if (!empty($errors)) 
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'nama_wali' => $_POST['txtWal'],
		'wal_id' => $_POST['txtNama'],
		'jurwal_id' => $_POST['txtJur']
	);

	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO walikelas (".implode(',', $key).")" ." VALUES('".implode("','", $val)."') ";
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Tersimpan';
}

echo json_encode($info);