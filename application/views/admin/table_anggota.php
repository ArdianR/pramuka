<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			Table anggota
			<span class="pull-right">
				<a href="#" class="link " data-id='<?php echo base_url("anggota/form_anggota")?>'>
				<i class="fa fa-plus"></i> Tambah Data
				</a>
			</span>
			</div>
			<div class="panel-body">
				<div class="pesan"></div>
				<table id="tblanggota" class="table table-hover">
					<thead class="bg-primary">
						<th>Foto</th>
						<th>Nama anggota</th>
						<th>JK</th>
						<th>Agama</th>
						<th>Gol.Darah</th>
						<th>Ranting</th>
						<th>Gudep</th>
						<th>Kode gudep</th>
						<th>Golongan</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php foreach($anggota->result() as $row):?>
						<tr id="row-<?=$row->idanggota;?>">
							<td width="100px">
								<img width="100px" src="<?=base_url("uploads/$row->foto");?>">
							</td>
							<td>
								<?=$row->nama_anggota;?>
							</td>
							<td>
								<?=$row->jenis_kelamin;?>
							</td>
							<td>
								<?=$row->agama;?>
							</td>
							<td>
								<?=$row->golongan_darah;?>
							</td>
							<td>
								<?=$row->nama_kwaran;?>
							</td>
							<td>
								<?=$row->nama_gudep;?>
							</td>
							<td>
								<?=$row->kode_gudep;?>
							</td>
							<td>
								<?=$row->golongan;?>
							</td>
							<td width="10%">
								<a target="__blank" class="adminOnly btn btn-primary" href="<?php echo base_url("anggota/kta/$row->idanggota");?>" title="Edit">
									<i class="fa fa-print"></i>
								</a>
								<a href="#" class="btn btn-success link" data-id="<?php echo base_url("anggota/form_anggota/$row->idanggota");?>" title="Edit">
									<i class="fa fa-edit"></i>
								</a>
									<a id="<?=$row->idanggota;?>" href="#" class="btn btn-danger delete" title="Delete">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		 $('#tblanggota').DataTable();
		  				var level=<?=$level;?>;
							 if (parseInt(level)>=1) {
							 	$('.adminOnly').remove();
							 }

	})



	$('.delete').click(function () {
		var idanggota=$(this).attr('id');
		if (confirm("Apakah Anda Yakin?")) {

				$.get('<?php echo base_url("anggota/delete");?>/'+idanggota+'',function (data) {
					$('#row-'+idanggota+'').remove();
					var pesan="<div class='alert alert-success'>Berhasil</div>";
					$('.pesan').html(pesan).show().delay(1000).fadeOut('slow');
					// $('#konten').load('<?php echo base_url("anggota/table_anggota");?>');
					return false;
			})
		}else{
			return false;
		}
	})

	$('.link').click(function () {
		var link=$(this).attr('data-id');
		$('#konten').load(link)
		return false;
	})
</script>