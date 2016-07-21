<div style="margin-left:10%;margin-right:20%" id="block">
<table border="0" width="100%">
	<tr>

		<td width="30%">
			<img src="<?php echo base_url("src/img/logo.png");?>" width='100px' style="margin-left:auto;margin-right:auto;display:block">
		</td>
		<td align="center">
			<h1 align="center">Data Anggota Pramuka<br> Kabupaten Sumedang</h1>
		</td>
	</tr>
</table>
<pre>
<table class="table table-responsive" border="1" width="100%">
	<thead style="background-color:#333;color:#fff" align="center">
		<th align="center">Foto</th>
		<th align="center">No.KTA</th>
		<th align="center">Nama</th>
		<th align="center">JK</th>
		<th align="center">Agama</th>
		<th align="center">Gol.Darah</th>
		<th align="center">Kwaran</th>
		<th align="center">Golongan</th>
		<th align="center">Keahlian</th>
		<th align="center">Sub Keahlian</th>
	
	</thead>
	<tbody>
		<?php foreach($hasil->result() as $row):?>
			<tr>
				<td style="padding:2px;" align="center">
					<img src="<?php echo base_url("uploads/$row->foto");?>" width='100px' style="margin-left:auto;margin-right:auto;display:block">
				</td>
				<td style="padding:2px;" align='center'><?=$row->idanggota;?></td>
				<td style="padding:2px;" align='center'><?=$row->nama_anggota;?></td>
				<td style="padding:2px;" align='center'><?=$row->jenis_kelamin;?></td>
				<td style="padding:2px;" align='center'><?=$row->agama;?></td>
				<td style="padding:2px;" align='center'><?=$row->golongan_darah;?></td>
				<td style="padding:2px;" align='center'><?=$row->nama_kwaran;?></td>
				<td style="padding:2px;" align='center'><?=$row->golongan;?></td>
				<td style="padding:2px;" align='center'><?=$row->nama_keahlian;?></td>
				<td style="padding:2px;" align='center'><?=$row->nama_sub;?></td>
			</tr>
		<?php endforeach;?>	
	</tbody>
</table>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#block').css('margin-left','0%');
		$('#block').css('margin-right','0%');
	})
</script>

