<?php if(!empty($idkwaran)) {?>
<form method="post" id="form_kwaran" action="<?php echo base_url("kwaran/update");?>">
<div class="container">
<div class="row">
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Form Edit Kwaran</h4>
	</div>
	<div class="panel-body">
	<div class="pesan"></div>
		<label>ID Kwaran</label>
		<input name="idkwaran" id="idkwaran" class="form-control" required>
		<label>Nama Kwaran</label>
		<input name="nama_kwaran" id="nama_kwaran" class="form-control">
		<label>Username</label>
		<input name="username" id="username" class="form-control">
		<label>Password</label>
		<input name="password" id="password" class="form-control" type="password">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control" id="keterangan"></textarea>
	</div>
	<div class="panel-footer">
			<a class="btn btn-default kembali" > Kembali</a>
			<button class="btn btn-primary" type="submit"> Simpan Data</button>
	</div>
</div>
</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function () {
		var url="<?php echo base_url("kwaran/detail/$idkwaran");?>";
		$.get(url,function (data) {
			var obj=JSON.parse(data);
			$('#idkwaran').val(obj[0].idkwaran).attr('readonly',true)
			$('#nama_kwaran').val(obj[0].nama_kwaran)
			$('#username').val(obj[0].username)
			$('#password').val(obj[0].password)
			$('#keterangan').val(obj[0].keterangan)
		});
	})
</script>
<?php } else {?>
<form method="post" id="form_kwaran" action="<?php echo base_url("kwaran/add");?>">
<div class="container">
<div class="row">
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Form Tambah Kwaran</h4>
	</div>
	<div class="panel-body">
	<div class="pesan"></div>
		<label>ID Kwaran</label>
		<input name="idkwaran" id="idkwaran" class="form-control">
		<label>Nama Kwaran</label>
		<input name="nama_kwaran" id="nama_kwaran" class="form-control">
		<label>Username</label>
		<input name="username" id="username" class="form-control">
		<label>Password</label>
		<input name="password" id="password" class="form-control" type="password">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control"></textarea>
	</div>
	<div class="panel-footer">
		<a class="btn btn-default kembali" > Kembali</a>
		<button class="btn btn-primary" type="submit"> Simpan Data</button>
	</div>
</div>
</div>
</div>
</form>
<?php };?>
<script type="text/javascript" src="<?php echo base_url("src/js/form.js") ?>"></script>
<script type="text/javascript">
	$('.kembali').click(function () {
		$('#konten').load('<?php echo base_url("kwaran/table_kwaran");?>');
	})
	var main =function  () {
			$('#form_kwaran').on('submit',function  (e) 
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