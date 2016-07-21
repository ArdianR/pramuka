<div class="container padKonten">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Detail Anggota
		<span class="pull-right"><a href="<?php echo base_url()?>" class='btn btn-default'> Kembali</a> </span></h3>
	</div>
	<?php if ($anggota->result()==null) {?>
	<div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<h1 class="text-center">
				:( Opps Data Tidak Ditemukan
			</h1>
		</div>
	</div>
	<?php } else { ?>
	<?php foreach($anggota->result() as $row):?>
	<div class="panel-body">
		<table class="table table-striped table-condensed table-bordered">
			<thead>
				<th colspan="2">
					<img width="200px" class="img-tengah" src="<?php echo base_url("uploads/$row->foto");?>">
				</th>
			</thead>
			<tbody>
				<tr><td>ID ANGGOTA</td><td><?=$row->idanggota;?></td></tr>
				<tr><td>Nama Anggota</td><td><?=$row->nama_anggota;?></td></tr>
				<tr><td>Jenis Kelamin</td><td><?=$row->jenis_kelamin;?></td></tr>
				<tr><td>Agama</td><td><?=$row->agama;?></td></tr>
				<tr><td>Gol. Darah</td><td><?=$row->golongan_darah;?></td></tr>
				<tr><td>Alamat</td><td><?=$row->alamat;?></td></tr>
				<tr><td>Kwaran</td><td><?=$row->nama_kwaran;?></td></tr>
				<tr><td>Gudep</td><td><?=$row->nama_gudep;?></td></tr>
				<tr><td>Kode Gudep</td><td><?=$row->kode_gudep;?></td></tr>
				<tr><td>Keahlian</td><td><?=$row->keahlian;?></td></tr>
			</tbody>
		</table>
	</div>
	<?php endforeach;?>
	<?php };?>
</div>
</div>