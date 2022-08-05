<?php

require '../connect.php';
$errors = array();
$info 	= array();

if (empty($_POST['txtNama']))
		$errors['nama'] = "Kelas Belum DiIsi";

if (empty($_POST['txtJur']))
		$errors['jurusan'] = "Jurusan Belum DiIsi";

if (empty($_POST['txtJum']))
		$errors['jumlah'] = "Jumlah Belum DiIsi";
	
if (!empty($errors)) 
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'jur_id' => $_POST['txtJur'],
		'nama_kelas' => $_POST['txtNama'],
		'jum_siswa' => $_POST['txtJum']

	);

	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO kelas (".implode(',', $key).")" ." VALUES('".implode("','", $val)."') ";
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Tersimpan';
}

echo json_encode($info);