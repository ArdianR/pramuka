<?php if (!empty($idanggota)) { ?>
<form enctype="multipart/form-data" id="form_anggota" method="post" action="<?php echo base_url("anggota/update");?>">
	<div class="container">
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Form Edit Anggota</h4></div>
		<div class="panel-body">
		<div class="pesan"></div>
			<label>ID Anggota/Kartu Tanda Anggota (KTA)</label>
			<input name="idanggota" id="idanggota" class="form-control">
			<label>Nama Anggota</label>
			<input name="nama_anggota" id="nama_anggota" class="form-control">
			<label>Tempat lahir</label>
			<input name="tempat_lahir" id="tempat_lahir" class="form-control">
			<label>Tanggal Lahir</label>
			<div class='form-group'>
				<div class='form-inline'>
					<select name='tanggal' class='form-control' id='tanggal'>
					<?php for ($i=1; $i < 31; $i++) :?> 
						<option value='<?=sprintf("%'02d",$i);?>'>
							<?=sprintf("%'02d",$i);?>
						</option>
					<?php endfor;?>
					</select>
					<select name='bulan' class='form-control' id='bulan'>
					<?php for ($i=1; $i < 12; $i++) :?> 
						<option value='<?=sprintf("%'02d",$i);?>'>
							<?=sprintf("%'02d",$i);?>
						</option>
					<?php endfor;?>
					</select>
					<select name='tahun' class='form-control' id='tahun'>
					<?php for ($i=1980; $i <2000; $i++) :?> 
						<option value='<?=$i;?>'>
							<?=$i;?>
						</option>
					<?php endfor;?>
					</select>
				</div>
			</div>
			<label>Jenis Kelamin</label>
			<select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
				<option value="L">LAKI-LAKI</option>
				<option value="P">PEREMPUAN</option>
			</select>
				<label>Agama</label>
			<select id="agama" name="agama" class="form-control">
				<option value="ISLAM">ISLAM</option>
				<option value="KHATOLIK">KHATOLIK</option>
				<option value="PROTESTAN">PROTESTAN</option>
				<option value="HINDU">HINDU</option>
				<option value="BUDHA">BUDHA</option>
			</select>
				<label>Golongan Darah</label>
				<select id="gol_darah" name="gol_darah" class="form-control">
				<option value="O">O</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="AB">AB</option>
			</select>
				<label>Alamat</label>
			<textarea class="form-control" name="alamat" id="alamat"></textarea>
			<label>KWARAN</label>
			<select id="idkwaran" name="idkwaran" class="form-control">
				<?php  foreach($kwaran->result() as $row):?>
					<option value="<?=$row->idkwaran;?>"><?=$row->nama_kwaran;?></option>
				<?php  endforeach;?>
			</select>
			<label>GUDEP</label>
			<select id="idgudep" name="idgudep" class="form-control">
				<option></option>
			</select>
			<label>Kode Gudep</label>
			<input id="kode_gudep" name="kode_gudep" class="form-control" readonly>
			<label>GOLONGAN</label>
			<select id="golongan" name="golongan" class="form-control">
				<option value="SIAGA">SIAGA</option>
				<option value="PENGGALANG">PENGGALANG</option>
				<option value="PENEGAK">PENEGAK</option>
				<option value="PEMBINA">PEMBINA</option>
			</select>
			<label>Keahlian (Satuan Karya)</label>
			<select name="satuan_karya" id="satuan_karya" class="form-control">
				<?php  foreach($keahlian->result() as $row):?>
					<option value="<?=$row->idkeahlian;?>"><?=$row->nama_keahlian;?></option>
				<?php  endforeach;?>
			</select>
			<label>Sub Keahlian (Satuan Karya)</label>
			<select name="keahlian" id="keahlian" class="form-control">
				
			</select>
			<label>Foto</label>
			<input name="userfile" type="file" id="foto" class="form-control">
		</div>
		<div class="panel-body">
			<div class="pesan"></div>
		</div>
		<div class="panel-footer">
			<a class="btn btn-default kembali"> Kembali</a>
			<button class="btn btn-primary"> Simpan Data</button>
		</div>
	</div>
</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function () {
		var idanggota=<?=$idanggota;?>;
		
		$.get('<?php echo base_url("anggota/detail");?>/'+idanggota+'',function (data) {
			var obj=JSON.parse(data);
			$('#idanggota').val(obj.idanggota)
			$('#idanggota').attr('readonly',true)
			$('#nama_anggota').val(obj.nama_anggota)
			$('#jenis_kelamin').val(obj.jenis_kelamin)
			$('#agama').val(obj.agama)
			$('#gol_darah').val(obj.golongan_darah)
			$('#alamat').html(obj.alamat)
			$('#idkwaran').val(obj.idkwaran)
			$('#idgudep').val(obj.idgudep)
			$('#kode_gudep').val(obj.kode_gudep)
			$('#golongan').val(obj.golongan)
			$('#keahlian').val(obj.keahlian)
			$('#tempat_lahir').val(obj.tempat_lahir)
			$('#tanggal').val(obj.tanggal)
			$('#bulan').val(obj.bulan)
			$('#tahun').val(obj.tahun)
			$('#foto').after("Biarkan Kosong Jika Tidak Diubah")
		})
	})
</script>
<?php } else{ ?>

<form enctype="multipart/form-data" id="form_anggota" method="post" action="<?php echo base_url("anggota/add");?>">
	<div class="container">
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Form Tambah Anggota</h4></div>
		<div class="panel-body">
		<div class="pesan"></div>
			<label>ID Anggota/Kartu Tanda Anggota (KTA)</label>
			<input name="idanggota" id="idanggota" class="form-control">
			<label>Nama Anggota</label>
			<input name="nama_anggota" id="nama_anggota" class="form-control">
			<label>Tempat lahir</label>
			<input name="tempat_lahir" id="tempat_lahir" class="form-control">
			<label>Tanggal Lahir</label>
			<div class='form-group'>
				<div class='form-inline'>
					<select name='tanggal' class='form-control' id='tanggal'>
					<?php for ($i=1; $i < 31; $i++) :?> 
						<option value='<?=sprintf("%'02d",$i);?>'>
							<?=sprintf("%'02d",$i);?>
						</option>
					<?php endfor;?>
					</select>
					<select name='bulan' class='form-control' id='bulan'>
					<?php for ($i=1; $i < 12; $i++) :?> 
						<option value='<?=sprintf("%'02d",$i);?>'>
							<?=sprintf("%'02d",$i);?>
						</option>
					<?php endfor;?>
					</select>
					<select name='tahun' class='form-control' id='tahun'>
					<?php for ($i=1980; $i <date('Y'); $i++) :?> 
						<option value='<?=$i;?>'>
							<?=$i;?>
						</option>
					<?php endfor;?>
					</select>
				</div>
			</div>
			<label>Jenis Kelamin</label>
			<select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
				<option value="L">LAKI-LAKI</option>
				<option value="P">PEREMPUAN</option>
			</select>
				<label>Agama</label>
			<select id="agama" name="agama" class="form-control">
				<option value="ISLAM">ISLAM</option>
				<option value="KHATOLIK">KHATOLIK</option>
				<option value="PROTESTAN">PROTESTAN</option>
				<option value="HINDU">HINDU</option>
				<option value="BUDHA">BUDHA</option>
			</select>
				<label>Golongan Darah</label>
				<select id="alamat" name="gol_darah" class="form-control">
				<option value="O">O</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="AB">AB</option>
			</select>
				<label>Alamat</label>
			<textarea class="form-control" name="alamat" id="alamat"></textarea>
			<label>KWARAN</label>
			<select id="idkwaran" name="idkwaran" class="form-control">
					<option value=''>-Pilih Data-</option>
				<?php  foreach($kwaran->result() as $row):?>
					<option value="<?=$row->idkwaran;?>"><?=$row->nama_kwaran;?></option>
				<?php  endforeach;?>
			</select>
			<label>GUDEP</label>
			<select id="idgudep" name="idgudep" class="form-control">
				<option></option>
			</select>
			<label>Kode Gudep</label>
			<input id="kode_gudep" name="kode_gudep" class="form-control" readonly>
				<label>GOLONGAN</label>
			<select id="golongan" name="golongan" class="form-control">
				<option value="SIAGA">SIAGA</option>
				<option value="PENGGALANG">PENGGALANG</option>
				<option value="PENEGAK">PENEGAK</option>
				<option value="PEMBINA">PEMBINA</option>
			</select>
				<label>Keahlian (Satuan Karya)</label>
			<select name="satuan_karya" id="satuan_karya" class="form-control">
				<?php  foreach($keahlian->result() as $row):?>
					<option value="<?=$row->idkeahlian;?>"><?=$row->nama_keahlian;?></option>
				<?php  endforeach;?>
			</select>
			<label>Sub Keahlian (Satuan Karya)</label>
			<select name="keahlian" id="keahlian" class="form-control">
				
			</select>
			<label>Foto</label>
			<input name="userfile" type="file" id="foto" class="form-control">
		</div>
		<div class="panel-body">
			<div class="pesan"></div>
		</div>
		<div class="panel-footer">
			<a class="btn btn-default kembali"> Kembali</a>
			<button class="btn btn-primary"> Simpan Data</button>
		</div>
	</div>
</div>
</div>
</form>

<?php };?>
<script type="text/javascript" src="<?php echo base_url("src/js/form.js") ?>"></script>
<script type="text/javascript">
	var main =function  () {
			$('#form_anggota').on('submit',function  (e) 
			{
				e.preventDefault();
				$(this).ajaxSubmit(
				{
					beforeSend:function  ()
					{	
					},
					uploadProgress:function  (event,position,total,percentComplete) 
					{				
					},
					success:function(data) 
					{
						if (data==1) {
					    	var pesan="<div class='alert alert-success'>Berhasil</div>";
					    	$('.pesan').html(pesan).show().delay(5000).fadeOut('slow');
					    	$('.form-control').val('');
					    }else{
					    	var pesan="<div class='alert alert-danger'>"+data+"</div>";
					    	$('.pesan').html(pesan).show().delay(5000).fadeOut('slow');
					    }
					}

				});
			})
		};
		$(document).ready(main);
</script>
<script type="text/javascript">
	$(document).ready(function () {
		// $('#idkwaran').select2();
	})
		$('#idkwaran').change(function () {
			var idkwaran=$(this).val();
			$.get('<?php echo base_url("gudep/list_gudep");?>/'+idkwaran+'',function (data) {
					$('#idgudep').html(data)
			})
		})

		
		$('#satuan_karya').change(function () {
			var idkeahlian=$(this).val();
			$.get('<?php echo base_url("anggota/sub_keahlian");?>/'+idkeahlian+'',function (data) {
				$('#keahlian').html(data);
			})
		})

		$('#idgudep').change(function () {
			var idgudep=$(this).val();
			var jk=$("#jenis_kelamin").val();
			$.get('<?php echo base_url("gudep/kode_gudep");?>/'+idgudep+'/'+jk+'',function (data) {
					$('#kode_gudep').val(data)
			})
		})


		$('.kembali').click(function () {
			$('#konten').load('<?php echo base_url("anggota/table_anggota");?>');
		})
</script>