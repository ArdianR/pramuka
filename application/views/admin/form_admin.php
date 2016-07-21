<?php foreach($admin->result() as $row):?>
<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
	<div class="pesan"></div>
		<form id="form_admin" method="post" action="<?php echo base_url("admin/update");?>">
		<label>Username</label>
		<input class="form-control" name="username" value="<?=$row->username;?>">
		<label>Password</label>
		<input class="form-control" name="password" type="password" value="">
		<button class="btn btn-primary btn-block">
			Update
		</button>
		</form>
	</div>
	</div>
</div>
<div class="col-md-4"></div>
</div>
<?php endforeach;?>

<script type="text/javascript" src="<?php echo base_url("src/js/form.js") ?>"></script>
<script type="text/javascript">
	var main =function  () {
			$('#form_admin').on('submit',function  (e) 
			{
				e.preventDefault();
				$(this).ajaxSubmit(
				{
					success:function(data) 
					{
						if (data==1) {
					    	var pesan="<div class='alert alert-success'>Berhasil</div>";
					    	$('.pesan').html(pesan).show().delay(1000).fadeOut('slow');
					    }else{
					    	var pesan="<div class='alert alert-danger'>"+data+"</div>";
					    	$('.pesan').html(pesan).show().delay(3000).fadeOut('slow');
					    }
					}

				});
			})
		};
		$(document).ready(main);
</script>