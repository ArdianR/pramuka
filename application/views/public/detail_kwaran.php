<?php 
	echo $array['kwaran'];
	foreach ($array['detail'] as $key) {
		echo $key->nama_gudep;	
	}
?>


<div class="container padKonten">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Detail Kwaran <?=$array['kwaran'];?>
		<span class="pull-right"><a href="<?php echo base_url()?>" class='btn btn-default'> Kembali</a> </span></h3>
	</div>
	<?php if ($array==null) {?>
	<div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<h1 class="text-center">
				:( Opps Data Tidak Ditemukan
			</h1>
		</div>
	</div>
	<?php } else { ?>
	<?php foreach ($array['detail'] as $key):?>
	<div class="panel-body">
		<table class="table table-striped table-condensed table-bordered" border=1>
			<tbody>
				<tr><td>Nama Gudep</td><td><?=$key->nama_gudep;?></td></tr>
				<tr><td>Kode Gudep Putra</td><td><?=$key->gudep_putra;?></td></tr>
				<tr><td>Kode Gudep Putri</td><td><?=$key->gudep_putri;?></td></tr>
				<tr>
					<td>Anggota</td>
					<td>
						<ul>
							<li>Total : <?=$key->total;?></li>
							<li>Muda : <?=$key->muda;?></li>
							<li>Desawa : <?=$key->dewasa;?></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>Siaga</td>
					<td>
						<ul>
							<li>Total : <?=$key->siaga;?> Orang</li>
							<li>Putra : <?=$key->siaga_putra;?> Orang</li>
							<li>Putri : <?=$key->siaga_putri;?> Orang</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>Peggalang</td>
					<td>
						<ul>
							<li>Total : <?=$key->penggalang;?> Orang</li>
							<li>Putra : <?=$key->penggalang_putra;?> Orang</li>
							<li>Putri : <?=$key->penggalang_putri;?> Orang</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>Pembina</td>
					<td>
						<ul>
							<li>Total : <?=$key->pembina;?> Orang</li>
							<li>Putra : <?=$key->pembina_putra;?> Orang</li>
							<li>Putri : <?=$key->pembina_putri;?> Orang</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php endforeach;?>
	<?php };?>
</div>
</div>