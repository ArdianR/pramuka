<?php if(!empty($idgudep)) {?>
<form enctype="multipart/form-data" method="post" id="form_gudep" action="<?php echo base_url("gudep/update");?>">
<div class="container">
<div class="row">
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Form Edit Gudep</h4>
	</div>
	<div class="panel-body">
		<div class="pesan"></div>
		<label>Kwartir Ranting</label>
		<select name="idkwaran" id="idkwaran" class="form-control" required>
			<?php foreach($kwaran->result() as $row):?>
				<option value="<?=$row->idkwaran;?>"><?=$row->nama_kwaran;?></option>
			<?php endforeach;?>
		</select>
		<label>Kode Gudep Putra</label>
		<input name="gudep_putra" id="gudep_putra" class="form-control" placeholder="Misal 1065">
		<input name="idgudep" id="idgudep" class="form-control" type="hidden" readonly>
		<label>Kode Gudep Putri</label>
		<input name="gudep_putri" id="gudep_putri" class="form-control" placeholder="Misal 1066">
		<label>Nama Gudep</label>
		<input name="nama_gudep" id="nama_gudep" class="form-control">
		<label>Keterangan</label>
		<textarea name="keterangan" id="keterangan" class="form-control">
		</textarea>
	</div>
	<div class="panel-footer">
		<a href="#" class="btn btn-default kembali"> Kembali</a>
		<button class="btn btn-primary" type="submit"> Simpan Data</button>
	</div>
</div>
</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function () {
		var url='<?php echo base_url("gudep/detail/$idgudep");?>';
		$.get(url,function (data) {
			var obj=JSON.parse(data);
			$('#idkwaran').val(obj[0].idkwaran)
			$('#idgudep').val(obj[0].idgudep)
			$('#nama_gudep').val(obj[0].nama_gudep)
			$('#gudep_putra').val(obj[0].gudep_putra)
			$('#gudep_putri').val(obj[0].gudep_putri)
			$('#keterangan').html(obj[0].keterangan)
		})
	})
</script>
<?php } else {?>
<form enctype="multipart/form-data" method="post" id="form_gudep" action="<?php echo base_url("gudep/add");?>">
<div class="container">
<div class="row">
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Form Tambah Gudep</h4>
	</div>
	<div class="panel-body">
	<div class="pesan"></div>
		<label>Kwartir Ranting</label>
		<select name="idkwaran" id="idkwaran" class="form-control" required>
		<option value="">Pilih Kwartir Ranting</option>
			<?php foreach($kwaran->result() as $row):?>
				<option value="<?=$row->idkwaran;?>"><?=$row->nama_kwaran;?></option>
			<?php endforeach;?>
		</select>
			<label>Kode Gudep Putra</label>
		<input name="gudep_putra" id="gudep_putra" class="form-control" placeholder="Misal 1065">
		<label>Kode Gudep Putri</label>
		<input name="gudep_putri" id="gudep_putri" class="form-control" placeholder="Misal 1066">
		<label>Nama Gudep</label>
		<input name="nama_gudep" id="nama_gudep" class="form-control">
		<label>Keterangan</label>
		<textarea name="keterangan" id="keterangan" class="form-control"></textarea>
	</div>
	<div class="panel-footer">
		<a href="#" class="btn btn-default kembali"> Kembali</a>
		<button class="btn btn-primary" type="submit"> Simpan Data</button>
	</div>
</div>
</div>
</div>
</form>
<?php };?>
<script type="text/javascript">
	$(document).ready(function () {
		// $('#idkwaran').select2();
	})
	$('#idkwaran').change(function () {
		var idkwaran=$(this).val();
		$('#gudep_putra').val(idkwaran)
	})
	$('#gudep_putra').change(function () {
		var gudep_putra=$(this).val();
		var gudep_putri=parseInt(gudep_putra) + 1;
		$('#gudep_putri').val(gudep_putri)
	})
	$('.kembali').click(function () {
		$('#konten').load('<?php echo base_url("gudep/table_gudep");?>')
	})
</script>
<script type="text/javascript" src="<?php echo base_url("src/js/form.js") ?>"></script>
<script type="text/javascript">
	var main =function  () {
			$('#form_gudep').on('submit',function  (e) 
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
					    	$('.pesan').html(pesan).show().delay(1000).fadeOut('slow');
					    	$('.form-control').val('');
					    }else{
					    	var pesan="<div class='alert alert-danger'>"+data+"</div>";
					    	$('.pesan').html(pesan).show().delay(3000).fadeOut('slow');
					    }
					}

				});
			})
		};
		$(document).ready(main);
</script>