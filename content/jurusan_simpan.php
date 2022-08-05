<?php

require '../connect.php';
$errors = array();
$info 	= array();

if (empty($_POST['txtNama']))
		$errors['nama'] = "Jurusan Belum DiIsi";
	
if (!empty($errors)) 
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$data = array(
		'nama_jurusan' => $_POST['txtNama']
	);

	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO jurusan (".implode(',', $key).")" ." VALUES('".implode(',', $val)."') ";
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Tersimpan';
}

echo json_encode($info);