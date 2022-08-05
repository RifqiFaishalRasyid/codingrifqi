<?php

require '../connect.php';

$errors = array();
$info 	= array();

if (empty($_POST['id']))
	$erorrs['id'] = 'ID Tidak Ada';

if (!empty($errors)) 
{
	$info['success'] = false;
	$info['errors'] = $errors;
}
else
{
	$id = $_POST['id'];
	$sql = "DELETE FROM kelas WHERE id='$id'";
	mysqli_query($conn, $sql);
	$info['success'] = true;
	$info['message'] = 'Berhasil Terhapus';
}

echo json_encode($info);