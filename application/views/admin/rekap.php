<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Data Anggota</h3>
		</div>
		<div class="panel-body">
				<table width="100%" id="tblanggota" class="table table-striped table-condensed table-bordered">
					<thead class="bg-primary">
						<th>Foto</th>
						<th>Nama</th>
						<th>JK</th>
						<th>Agama</th>
						<th>Gol. Darah</th>
						<th>Ranting</th>
						<th>Gudep</th>
						<th>Kode gudep</th>
						<th>Gol</th>
					</thead>
					<tbody>
					<?php foreach($anggota as $row):?>
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
						</tr>
					<?php endforeach;?>
					</tbody>
					</table>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		window.print();
	})
</script>