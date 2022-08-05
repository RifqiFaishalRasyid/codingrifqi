<?php

require '../connect.php';
$errors = array();
$info 	= array();

if (empty($_POST['txtNama']))
		$errors['nama'] = "Nama jurusan Belum DiIsi";
	
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
	$where = $_POST['txtId'];
	$cols  = array();
	foreach ($data as $key => $value) {
		$cols[] = "$key = '$value'";
	}

	$sql = "UPDATE jurusan SET ". implode(',', $cols)." WHERE id=".$where;
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Diubah';
}

echo json_encode($info);