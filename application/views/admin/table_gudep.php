<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			Table Gudep
			<span class="pull-right">
				<a href="#" class="link " data-id='<?php echo base_url("gudep/form_gudep")?>'>
				<i class="fa fa-plus"></i> Tambah Data
				</a>
			</span>
			</div>
			<div class="panel-body">
				<div class="pesan"></div>
				<table id="tblgudep" class="table table-hover">
					<thead class="bg-primary">
						<th>Nama Gudep</th>
						<th>Gudep Putra</th>
						<th>Gudep Putri</th>
						<th>Kwartir Ranting</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php foreach($gudep->result() as $row):?>
						<tr id="row-<?=$row->idgudep;?>">
							<td>
								<?=$row->nama_gudep;?>
							</td>
							<td>
								<?=$row->gudep_putra;?>
							</td>
							<td>
								<?=$row->gudep_putri;?>
							</td>
							<td>
								<?=$row->nama_kwaran;?>
							</td>
							<td width="10%">
								<a href="#" class="btn btn-success link" data-id="<?php echo base_url("gudep/form_gudep/$row->idgudep");?>" title="Edit">
									<i class="fa fa-edit"></i>
								</a>
									<a id="<?=$row->idgudep;?>" href="#" class="btn btn-danger delete" title="Delete">
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
		 $('#tblgudep').DataTable();
	})

	$('.delete').click(function () {
		var idgudep=$(this).attr('id');
		if (confirm("Apakah Anda Yakin?")) {

				$.get('<?php echo base_url("gudep/delete");?>/'+idgudep+'',function (data) {
					$('#row-'+idgudep+'').remove();
					var pesan="<div class='alert alert-success'>Berhasil</div>";
					$('.pesan').html(pesan).show().delay(1000).fadeOut('slow');
					// $('#konten').load('<?php echo base_url("gudep/table_gudep");?>');
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