<?php require '../connect.php'; ?>

<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Level</th>
			<th>#</th>
		</tr>
	</thead>
	</tbody>
			<?php 
				$sql ='SELECT * FROM login'; 
				$data = mysqli_query($conn, $sql);
				$no = (int)1;
				foreach ($data as $row) 
				{
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['username'] ?></td>
				<td><?php echo $row['level'] ?></td>
				<td>#</td>
			</tr>
			<?php }?>
	</tbody>
</table>