<?php if ($keahlian->result()==null) { ?>
		<option value="">-Data Kosong-</option>
<?php } else {?>
<?php foreach($keahlian->result() as $row):?>
<option value="<?=$row->nama_sub;?>"><?=$row->nama_sub;?></option>
<?php endforeach;};?>

