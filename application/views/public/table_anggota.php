<div class="container-fluid pad">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<h3>Kwaran <?=$kwaran;?>
				
				<div class="pull-right">
				<a class="btn btn-primary" href="<?php echo base_url();?>" >Kembali</a>
			</div>
			</h3>
			
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
						
						<th>Kode gudep</th>
						<th>Golongan</th>
						
					</thead>
					<tbody>
					<?php foreach($data as $row):?>
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
								<?=$row->kode_gudep;?>
							</td>
							<td>
								<?=$row->golongan;?>
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
	})
</script>