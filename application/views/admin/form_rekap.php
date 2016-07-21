<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Buat Laporan Golongan</h3>
	</div>
	<div class="panel-body">
		<form method="post" id="form_golongan" action="#">
			<div class="form-inline">
				<label>Golongan</label>:
				<select required class="form-control" name="golongan">
						<option value="">-Pilih Golongan-</option>
					<?php foreach($golongan->result() as $row):?>
						<option value="<?=$row->golongan;?>"><?=$row->golongan;?></option>
					<?php endforeach;?>
				</select>
				<label>Kwaran</label>:
				<select required class="form-control" name="kwaran" id="kwaran">
					<option value="">-Pilih Kwaran-</option>
				<?php foreach($kwaran->result() as $row):?>
					<option value="<?=$row->idkwaran;?>"><?=$row->nama_kwaran;?></option>
				<?php endforeach;?>
				</select>
				<a href="#" class="search btn btn-primary">
					<i class="fa fa-search"></i> Cari 
				</a>
		</div>
		</form>
	</div>
	<div class="panel-body">
		<div id="report">
			
		</div>
	</div>
	<div class="panel-footer text-right" id="tprint">
	<a href="<?php echo base_url("rekap/cetak");?>" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#tprint').hide();
	})
	$('.search').click(function () {
		$.post('<?php echo base_url("rekap/rekap_golongan");?>',
				$('#form_golongan').serialize(),
				function(data){
					$('#report').html(data);
					$('#tprint').show();
				}
		);
	})
</script>