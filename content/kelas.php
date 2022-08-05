</br>
<center><h3 style="font-family:arial-narrow;">KELAS</h3></center>
<div class="mb-3">
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kelas">Tambah</button>
</div>
<table class="table table-striped" style="background-color: white;">
	<thead>
	<thead>
		<tr style="background-color: lightblue;">
			<th width="8%">No</th>
			<th>Nama Kelas</th>
			<th>Nama Jurusan</th>
			<th>Jumlah Siswa</th>
			<th width="13%">Keterangan</th>

		</tr>
	</thead>
	<tbody>
		<?php
		$sql  = "SELECT k.id, k.jur_id, k.nama_kelas, k.jum_siswa, j.nama_jurusan FROM kelas k INNER JOIN jurusan j ON j.id = k.jur_id";
		$data = mysqli_query($conn, $sql);
		$no   = (int)1;
		foreach ($data as $rows): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $rows['nama_kelas'] ?></td>
			<td><?php echo $rows['nama_jurusan'] ?></td>
			<td><?php echo $rows['jum_siswa'] ?></td>


			<td>
				<a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="ganti(<?php echo $rows['id']; ?>)">Ubah</a>
				<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(<?php echo $rows['id']; ?>)">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="modal fade" id="kelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" id="form_kelas">
      		<label for="">Nama Kelas</label>
	        <input type="text" name="txtNama" id="nama" class="form-control" placeholder="Nama Kelas">
	        <label for="">Jurusan</label>
	        <select name="txtJur" id="jurusan" class="form-control custom-select">
	        	<option value="">Pilih Jurusan</option>
	        	<?php 
	        	$sql = "SELECT * FROM jurusan"; $data = mysqli_query($conn, $sql); 
	        	?>
	        	<?php foreach ($data as $opt): ?>
	        	<?php echo '<option value="'.$opt['id'].'">'.$opt['nama_jurusan'].'</option>'; ?>
	        	<?php endforeach ?>
	        </select>
	        <label for="">Jumlah Siswa</label>
	        <input type="text" name="txtJum" id="jumlah" class="form-control" placeholder="Jumlah Siswa">
			<input type="hidden" name="txtId">
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="save" class="btn btn-primary" onclick="simpan()">SIMPAN</button>
        <button type="button" id="update" class="btn btn-warning" disabled="disabled" onclick="ubah()">UBAH</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function simpan() {
		$.ajax({
			url  	 : 'content/kelas_simpan.php',
			type 	 : 'POST',
			dataType : 'JSON',
			data     : $('#form_kelas').serialize(),
			success:function (data) {
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
					if(!data.success){
					alert(data.errors.jumlah);
					$('#jumlah').focus();
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
	

	function ganti(id) {
		$('#kelas').modal('show');
		$.ajax({
			url		 : 'content/kelas_tampil.php',
			type     : 'POST',
			dataType : 'JSON',
			data     : { id : id },
			success:function(data) {
				$('#save').attr('disabled','disabled');
				$('#update').removeAttr('disabled');
				$('input[name="txtNama"]').val(data.nama_kelas);
				$('select[name="txtJur"]').val(data.jur_id);
				$('input[name="txtJum"]').val(data.jum_siswa);
				$('input[name="txtId"]').val(data.id);
			}
		})
	}

	function ubah(){
		alert('DATA DIUBAH')
		$.ajax({
			url  	 : 'content/kelas_simpan_ubah.php',
			type 	 : 'POST',
			dataType : 'JSON',
			data     : $('#form_kelas').serialize(),
			success:function (data) {
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
				if(!data.success){
					alert(data.errors.jumlah);
					$('#jumlah').focus();
					return false;
				}
				else{
					alert(data.message);
					window.location.reload();
				}
			}
		})
	}



	function hapus(id){
		if (confirm('Anda Yakin Ingin Menghapus')) {
			$.ajax({
			url  	 : 'content/kelas_hapus.php',
			type 	 : 'POST',
			dataType : 'JSON',
			data     : { id : id },
			success:function (data) {
				if(!data.success){
					alert(data.errors.id);
					$('#id').focus();
					return false;
				}
				if(!data.success){
					alert(data.errors.jurusan);
					$('#jurusan').focus();
					return false;
				}
				if(!data.success){
					alert(data.errors.jumlah);
					$('#jumlah').focus();
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