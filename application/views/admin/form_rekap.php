<div class="container">
<div class="row">
<div class="col-md-4">
</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Buat Laporan
			</div>
			<form target="__blank" method="post" action="<?php echo base_url("rekap/create_rekap"); ?>" id='form_rekap'>
				<div class="panel-body">
				<div class="pesan"></div>
				<label>Nama Kwaran</label>
				<select required class="form-control" name="kwaran" id="kwaran">
					<option value="">-Pilih Kwaran-</option>
				<?php foreach($kwaran->result() as $row):?>
					<option value="<?=$row->idkwaran;?>"><?=$row->nama_kwaran;?></option>
				<?php endforeach;?>
				</select>
				<label>Nama Gudep</label>
				<select required class="form-control" name="gudep"  id="gudep">
				<option value="">-Data Kosong-</option>
				</select>
				<label>Golongan</label>
				<select required class="form-control" name="golongan">
					<?php foreach($golongan->result() as $row):?>
						<option value="<?=$row->golongan;?>"><?=$row->golongan;?></option>
					<?php endforeach;?>
				</select>
				</select>
				<label>Keahlian (Satuan Karya)</label>
				<select name="satuan_karya" id="satuan_karya" class="form-control">
					<?php  foreach($keahlian->result() as $row):?>
						<option value="<?=$row->idkeahlian;?>"><?=$row->nama_keahlian;?></option>
					<?php  endforeach;?>
				</select>
				<label>Sub Keahlian (Satuan Karya)</label>
				<select name="keahlian" id="keahlian" class="form-control">
					
				</select>
				</div>
				<div class="panel-footer">
				<button type="submit" class="btn btn-primary btn-block"> Buat Laporan </button>
				</div>
			</form>
			
		</div>
	</div>
	<div class="col-md-4"></div>
</div>
</div>
<script type="text/javascript">
		$('#kwaran').change(function () {
			var kwaran=$(this).val();
			$.get('<?php echo base_url("gudep/list_gudep");?>/'+kwaran+'',function (data) {
					$('#gudep').html(data)
			})
		})

			$('#satuan_karya').change(function () {
			var idkeahlian=$(this).val();
			$.get('<?php echo base_url("anggota/sub_keahlian");?>/'+idkeahlian+'',function (data) {
				$('#keahlian').html(data);
			})
		})
</script>
