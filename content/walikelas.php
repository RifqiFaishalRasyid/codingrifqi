</br>
<center><h3 style="font-family:arial-narrow;">WALI KELAS</h3></center>
<div class="mb-3">
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#walikelas">
  Tambah
</button>
</div>
<table class="table table-striped" style="background-color: white;">
	<thead>
		<tr style="background-color: lightblue;">
			<th width="8%">No</th>
			<th>Nama Wali Kelas</th>
			<th>Nama Kelas</th>
			<th>Nama Jurusan</th>
			<th width="13%">Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql  = "SELECT w.id, w.wal_id, w.jurwal_id, w.nama_wali, k.nama_kelas, j.nama_jurusan FROM walikelas w INNER JOIN kelas k ON k.id = w.wal_id INNER JOIN jurusan j ON j.id = w.jurwal_id";
		$data = mysqli_query($conn, $sql);
		$no   = (int)1;
		foreach ($data as $rows): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $rows['nama_wali'] ?></td>
			<td><?php echo $rows['nama_kelas'] ?></td>
			<td><?php echo $rows['nama_jurusan'] ?></td>
			<td>
				<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="modal fade" id="walikelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Wali Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" id="form_walikelas">
      		<label for="">Nama Wali Kelas</label>
	        <input type="text" name="txtWal" id="walas" class="form-control" placeholder="Nama Wali Kelas">
	        <label for="">Nama Kelas</label>
	        <select name="txtNama" id="nama" class="form-control custom-select">
	        	<option value="">Pilih Kelas</option>
	        	<?php 
	        	$sql = "SELECT * FROM kelas"; $data = mysqli_query($conn, $sql); 
	        	?>
	        	<?php foreach ($data as $opt): ?>
	        	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama_kelas'].'</option>'; ?>
	        	<?php endforeach ?>
	        </select>
	        <label for="">Nama Jurusan</label>
	        <select name="txtJur" id="Jurusan" class="form-control custom-select">
	        	<option value="">Pilih Jurusan</option>
	        	<?php 
	        	$sql = "SELECT * FROM jurusan"; $data = mysqli_query($conn, $sql); 
	        	?>
	        	<?php foreach ($data as $opt): ?>
	        	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama_jurusan'].'</option>'; ?>
	        	<?php endforeach ?>
	        </select>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="save" class="btn btn-primary" onclick="simpan()">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function simpan() {		
		$.ajax({
			url  	 : 'content/wali_simpan.php',
			type 	 : 'POST',
			dataType : 'JSON',
			data     : $('#form_walikelas').serialize(),
			success:function (data) {
				if(!data.success){
					alert(data.errors.walas);
					$('#walas').focus();
					return false;
				}

				if(!data.success){
					alert(data.errors.nama);
					$('#nama').focus();
					return false;
				}

				if(!data.success){
					alert(data.errors.jurusan);
					$('#jurusan').focus();
					return false;
				}
				
				else
				{
					alert(data.message);
					window.location.reload();
				}
			}
		})
	}
	

	function ganti(id){
		$('#walikelas').modal('show');
		$.ajax({
			url		 : 'content/wali_tampil.php',
			type     : 'POST',
			dataType : 'JSON',
			data     : { id : id },
			success:function (data){
				$('#save').attr('disabled','disabled');
				$('#update').removeAttr('disabled');
				$('input[name="txtWal"]').val(data.wal_id);
				$('select[name="txtNama"]').val(data.nama_kelas);
				$('select[name="txtJur"]').val(data.jurwal_id);
				$('input[name="txtId"]').val(data.id);
			}
		})
	}

	function hapus(id){
		if (confirm('Anda Yakin Ingin Menghapus')) {
			$.ajax({
			url  	 : 'content/wali_hapus.php',
			type 	 : 'POST',
			dataType : 'JSON',
			data     : { id : id },
			success:function (data) {
				if(!data.success){
					alert(data.errors.nama);
					$('#nama').focus();
					return false;
				}

				if(!data.success){
					alert(data.errors.walas);
					$('#walas').focus();
					return false;
				}
				
				if(!data.success){
					alert(data.errors.jurusan);
					$('#jurusan').focus();
					return false;
				}
				else{
					alert(data.message);
					window.location.reload();
				}
			}

		})
	}
}

</script>