<!DOCTYPE html>
<html>
<head>
	<title>SIM Pramuka</title>
	<style type="text/css">
		body{
					background-image: url('<?php echo base_url("src/img/bg.jpg");?>');
					background-size: cover;
			}
		#heading
		{
		
			background-color: rgba(0,0,0,0.6);
			height: 800px;
			color :#fff;
			padding-bottom: 200px;
		}
		#footer
		{
			position: static;
			width: 100%;
			background-color: #333;
			bottom: 0px;
			color:#fff;
		}
		.jumbotron
		{
			background-color: rgba(255,255,255,0.1);
		}
		.pad-lg
		{
			padding-top: 100px;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header" style="padding:10px;">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> 
					<a href="">
					<img src="<?php echo base_url("src/img/pramukalogo.png");?>" width='60px'>
						SIM Pramuka Sumedang
					</a>
					
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				</div>
			</nav>
		</div>
	</div>
</div>
<?=$konten;?>
<section id="footer">
	<div class="container">
		<div class="row">
		<div class="col-md-3">
			<label>Alamat</label>
				<ul>
					<li>Data Kwaran</li>
					<li>Data Anggota</li>
					<li>Data Gudep</li>
				</ul>
		</div>
		<div class="col-md-3">
			<label>Kontak</label>
				<ul>
					<li>Data Kwaran</li>
					<li>Data Anggota</li>
					<li>Data Gudep</li>
				</ul>
		</div>
		<div class="col-md-3">
			<label>Link Terkait</label>
				<ul>
					<li>Data Kwaran</li>
					<li>Data Anggota</li>
					<li>Data Gudep</li>
				</ul>
		</div>
		<div class="col-md-3">
			<label>Media Sosial</label>
				<ul>
					<li>Data Kwaran</li>
					<li>Data Anggota</li>
					<li>Data Gudep</li>
				</ul>
		</div>
	</div>
	</div>
</section>

</body>
</html>