<title>Pramuka Sumedang</title>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header"> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href=""><i class="fa fa-leaf"></i> Home</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					<li>
							<a class="link" data-id="<?php echo base_url("kwaran/table_kwaran") ?>" href="#">Kwaran</a>
						</li>
						<li>
							<a class="link" data-id="<?php echo base_url("gudep/table_gudep") ?>" href="#">Gudep</a>
						</li>
						<li>
							<a class="link" data-id="<?php echo base_url("anggota/table_anggota") ?>" href="#">Anggota</a>
						</li>

						<li>
							
							<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
			<li>
				<a class="link" data-id="<?php echo base_url("rekap/form_rekap");?>" href="#">
						Per-Golongan
					</a>
					</li><li>
				<a class="link" data-id="<?php echo base_url("rekap/form_rekap_keahlian");?>" href="#">
						Per-Keahlian
				</a>
			</li>

							</ul>
						</li>
						</li>

						<li class="adminOnly">
							<a class="link " data-id="<?php echo base_url("admin/form_admin") ?>" href="#">Admin Setting</a>
						</li>	
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">Hallo, <?=$username;?></a>
						</li>
						<li>
									<a href="<?php echo base_url("panel/logout");?>">Logout</a>
								</li>
								<li>
									&nbsp;
									&nbsp;
								</li>
					</ul>
				</div>	
			</nav>
		</div>
	</div>
</div>
<div class="container-fluid pad">
<div class="row">
<div id="wait" class="text-center">
<i class="fa fa-circle-o-notch fa-spin fa-3x "></i>
</div>
<div id="konten">
	<div class="container">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1 class="text-center">Aplikasi Data Keanggotaan<br>
				<small>Pramuka Kabupaten Sumedang</small>
				</h1>
			</div>
		</div>
		<div class="col-md-3 block">
			<a href="#" class="link" data-id="<?php echo base_url("kwaran/table_kwaran") ?>">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>
						Kwaran (<span id="kwaran"></span>) <span class="pull-right"><i class="fa fa-building"></i></span>
					</h2>
				</div>
				<div class="panel-footer">
					<i class="fa fa-forward"></i> Detail
				</div>
			</div>
			</a>
		</div>
		<div class="col-md-3 block">
			<a href="#" class="link" data-id="<?php echo base_url("gudep/table_gudep") ?>">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h2>
						Gudep (<span id="gudep"></span>) <span class="pull-right"><i class="fa fa-home"></i></span>
					</h2>
				</div>
				<div class="panel-footer">
					<i class="fa fa-forward"></i> Detail
				</div>
			</div>
			</a>
		</div>
		<div class="col-md-3 block">
			<a href="#" class="link" data-id="<?php echo base_url("anggota/table_anggota") ?>">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h2>
						Anggota (<span id="anggota"></span>) <span class="pull-right"><i class="fa fa-users"></i></span>
					</h2>
				</div>
				<div class="panel-footer">
					<i class="fa fa-forward"></i> Detail
				</div>
			</div>
			</a>
		</div>
		<div class="col-md-3 adminOnly">
			<a href="#" class="link" data-id="<?php echo base_url("admin/form_admin") ?>">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2>
						Admin  <span class="pull-right"><i class="fa fa-user"></i></span>
					</h2>
				</div>
				<div class="panel-footer">
					<i class="fa fa-forward"></i> Detail
				</div>
			</div>
			</a>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
						$(document).ready(function () {
							

							$('#wait').css('display',"none");
							
							 var level=<?=$level;?>;
							 if (parseInt(level)>=1) {
							 	$('.adminOnly').remove();
							 	$('.block').removeClass('col-md-3').addClass('col-md-4');
							 }


							$.get('<?php echo base_url("panel/rekap");?>',function (data) {
								var obj=JSON.parse(data);
								$('#kwaran').html(obj.kwaran)
								$('#gudep').html(obj.gudep)
								$('#anggota').html(obj.anggota)
							})
						})
						$('.link').click(function () {
							var link=$(this).attr('data-id');
							$('#konten').load(link)
							return false;
						})
						$('ul li a').click(function() {
						    $('ul li.active').removeClass('active');
						    $(this).closest('li').addClass('active');
						});

						$(document).ajaxStart(function(){
				        $("#wait").css("display", "block");

				    });
				    $(document).ajaxComplete(function(){
				        $("#wait").css("display", "none");
				    });
</script>