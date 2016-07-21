<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			Table Kwaran
			<span class="pull-right">
				<?php if($idkwaran==0){?>
				<a href="#" class="link " data-id='<?php echo base_url("kwaran/form_kwaran")?>'>
					<i class="fa fa-plus"></i> Tambah Data
				</a>
				<?php };?>	
			</span>
			</div>
			<div class="panel-body">
				<div class="pesan"></div>
				<table id="tblkwaran" class="table table-hover">
					<thead class="bg-primary">
						<th>Nama Kwaran</th>
						<th>Username</th>
						<th>Keterangan</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php foreach($kwaran->result() as $row):?>
						<tr id="row-<?=$row->idkwaran;?>">
							<td>
								<?=$row->nama_kwaran;?>
							</td>
							<td>
								<?=$row->username;?>
							</td>
							<td>
								<?=$row->keterangan;?>
							</td>
							<td width="10%">
								<a href="#" class="btn btn-success link" data-id="<?php echo base_url("kwaran/form_kwaran/$row->idkwaran");?>" title="Edit">
									<i class="fa fa-edit"></i>
								</a>
								<?php if($idkwaran==0){?>
									<a id="<?=$row->idkwaran;?>" href="#" class="btn btn-danger delete" title="Delete">
									<i class="fa fa-trash"></i>
								</a>
								<?php };?>
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
		 $('#tblkwaran').DataTable();
	})

	$('.delete').click(function () {
		var idkwaran=$(this).attr('id');
		if (confirm("Apakah Anda Yakin?")) {

				$.get('<?php echo base_url("kwaran/delete");?>/'+idkwaran+'',function (data) {
					$('#row-'+idkwaran+'').remove();
					var pesan="<div class='alert alert-success'>Berhasil</div>";
					$('.pesan').html(pesan).show().delay(1000).fadeOut('slow');
					// $('#konten').load('<?php echo base_url("kwaran/table_kwaran");?>');
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