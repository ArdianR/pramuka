<?php if ($keahlian->result()==null) { ?>
		<option value="">-Data Kosong-</option>
<?php } else {?>
	<option value="">-Sub-Kehalian-</option>
<?php foreach($keahlian->result() as $row):?>
<option value="<?=$row->idsub;?>"><?=$row->nama_sub;?></option>
<?php endforeach;};?>

