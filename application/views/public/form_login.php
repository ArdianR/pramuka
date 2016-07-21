<style type="text/css">
	body{
	background-image: url('<?php echo base_url("src/img/bg.jpg");?>');
	}
	.pad-lg
	{
		padding-top: 100px;
	}
	.white{color: #fff;}
</style>
<body>
	<div class="container pad-lg">
<div class="col-md-4"></div>
<div class="col-md-4">
	<h1 class="white text-center">SISFO <br>Anggota Pramuka</h1>
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-sign-in"></i> Login</div>
		<div class="panel-body">
			<?php echo $this->session->flashdata('pesan');?>
			<form method="post" action="<?php echo base_url("login/auth");?>">
				<label>Username</label>
				<input name="username" class="form-control">
				<label>Password</label>
				<input name="password" type="password" class="form-control">
				<br>
				<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login</button>
			</form>
		</div>
	</div>
</div>
<div class="col-md-4"></div>
</div>
</body>