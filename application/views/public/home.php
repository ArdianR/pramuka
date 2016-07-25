<section id="heading">
		<div class="container-fluid pad-lg">
			<div class="col-md-7 pad">
			<div class="jumbotron">
				<h1>SIM <br><small>Pramuka Sumedang</small></h1>
			<blockquote>
				<ul>
					<li>Data Kwaran</li>
					<li>Data Anggota</li>
					<li>Data Gudep</li>
				</ul>
			</blockquote>
			</div>
			</div>
			<div class="col-md-5 pad">
			<div class="jumbotron">
			<h3>Cari Nomor Anggota</h3>
			<form class="form-inline" role="form" method="post" action="<?php echo base_url("anggota/detailAnggota");?>">
			  <div class="form-group">
			    <input type="text" name="idanggota" placeholder="Cari Nomor Anggota.." class="form-control" id="idanggota">
			  </div>
			  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari </button>
			</form>
			<h3>Cari Data Kwaran</h3>
			<form class="form-inline" role="form" method="post" action="<?php echo base_url("kwaran/DetailKwaran");?>">
			  <div class="form-group">
			   <select name="idkwaran" id="idkwaran" class="form-control">
			   	<?php foreach($kwaran->result() as $row):?>
			   		<option value="<?=$row->idkwaran;?>"><?=$row->nama_kwaran;?></option>
			   	<?php endforeach;?>
			   </select>
			  </div>
			  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari </button>
			</form>
			<span>Anda Admin? Silahkan</span>
				<a href="<?php echo base_url("login");?>"> Login</a>
			</div>
			</div>
		</div>
</section>