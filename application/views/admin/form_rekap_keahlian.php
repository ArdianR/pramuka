<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Buat Laporan Keahlian  </h3>
	</div>
	<div class="panel-body">
		<form method="post" id="form_golongan" action="#">
			<div class="form-inline">
				<label>Keahlian </label>:
				<select required class="form-control" name="keahlian" id="keahlian">
						<option value="">-Pilih Keahlian-</option>
					<?php foreach($keahlian->result() as $row):?>
						<option value="<?=$row->idkeahlian;?>"><?=$row->nama_keahlian;?></option>
					<?php endforeach;?>
				</select>
				<label>Sub Keahlian </label>:
				<select required class="form-control" name="sub_keahlian" id="sub_keahlian">
					
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
		$.post('<?php echo base_url("rekap/rekap_keahlian");?>',
				$('#form_golongan').serialize(),
				function(data){
					$('#report').html(data);
					$('#tprint').show();
				}
		);
	})
	$('#keahlian').change(function () {
		var idkeahlian=$(this).val()
		$.get('<?php echo base_url("anggota/sub_keahlian");?>/'+idkeahlian+'',function (data) {
			$('#sub_keahlian').html(data)
		})
	})
</script>