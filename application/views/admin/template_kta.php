<style type="text/css">
  .bg-kartu{
    background: rgba(1,99,94,1);
    background: -moz-linear-gradient(top, rgba(1,99,94,1) 0%, rgba(160,166,128,1) 100%);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(1,99,94,1)), color-stop(100%, rgba(160,166,128,1)));
    background: -webkit-linear-gradient(top, rgba(1,99,94,1) 0%, rgba(160,166,128,1) 100%);
    background: -o-linear-gradient(top, rgba(1,99,94,1) 0%, rgba(160,166,128,1) 100%);
    background: -ms-linear-gradient(top, rgba(1,99,94,1) 0%, rgba(160,166,128,1) 100%);
    background: linear-gradient(to bottom, rgba(1,99,94,1) 0%, rgba(160,166,128,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#01635e', endColorstr='#a0a680', GradientType=0 );
  }
</style>
<div class="container" id="kartu">
<div class="col-md-3"></div>
<div class="col-md-6">
  <?php foreach($anggota->result() as $row):?>
    <table class="bg-kartu" style="padding:10px; color:#fff; border-radius:5px;">
  <tr>
    <th>
        <img width="70px;" src="<?php echo base_url("src/img/TUNAS.png"); ?>">
    </th>
    <th colspan="2">
    <h1 align="center">KARTU TANDA ANGGOTA</h1>
    <h1 align="center">GERAKAN PRAMUKA</h1>
    </th>
  </tr>
  <hr>
  <tr>
    <td colspan="1"></td>
    <td colspan="2">
        <img height="10px" width="100%" src="<?php echo base_url("src/img/bendera.png");?>">
    </td>
  </tr>
  <tr>
    <th rowspan="11" style="padding:10px;">
      <img width="200px;" src="<?php echo base_url("uploads/$row->foto"); ?>">
    </th>
    <td>KTA</td>
    <td>: <?=$row->idanggota;?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>: <?=$row->nama_anggota;?></td>
  </tr>
  <tr>
    <td>Tempat, Tanggal lahir</td>
    <td>: <?=$row->tempat_lahir;?> , <?=dateindo($row->tanggal_lahir);?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>: <?=$row->jenis_kelamin;?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: <?=$row->alamat;?></td>
  </tr>
  <tr>
    <td>Agama</td>
    <td>: <?=$row->agama;?></td>
  </tr>
  <tr>
    <td>Golongan Darah</td>
    <td>: <?=$row->golongan_darah;?></td>
  </tr>
  <tr>
    <td>Kwaran</td>
    <td>: <?=$row->nama_kwaran;?></td>
  </tr>
  <tr>
    <td>Gudep / Kode Gudep</td>
    <td>: <?=$row->nama_gudep;?></td>
  </tr>
  <tr>
    <td>Golongan</td>
    <td>: <?=$row->golongan;?></td>
  </tr>
  <tr>
    <td>Keahlian</td>
    <td>: <?=$row->keahlian;?></td>
    </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
  <?php endforeach;?>
</div>
<div class="col-md-3"></div>
</div>
 <script src='<?php echo base_url("src/js/canvas.js");?>' type="text/javascript"></script>
 <script type="text/javascript">
        html2canvas(document.body).then(function(canvas) {
            document.body.appendChild(canvas);
            $('#kartu').remove()

        });
        
 </script>