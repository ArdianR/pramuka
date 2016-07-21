<?php if ($gudep->result()==null) { ?>
		<option value="">-Data Kosong-</option>
<?php } else {?>
<?php foreach($gudep->result() as $row):?>
<option value="<?=$row->idgudep;?>"><?=$row->nama_gudep;?></option>
<?php endforeach;};?>

