
<div class="row">
<!-- login -->
  <div class="col-sm-6">
  	  <div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">
    <span class="glyphicon glyphicon-bookmark"></span> Detail User</h3>    
	</div>

	<div class="panel-body">
  <table class="table">
  <?php
    $from_time = strtotime("$detailuser->tgl_terdaftar");
    $countp=0;
    $countk=0;
  ?>
  <tr><td>Nama Lengkap</td><td><?php echo ": ".ucfirst($detailuser->nama);?></td></tr>
  <tr><td>Level</td><td><?php echo ": ".$detailuser->level;?></td></tr>	
  <tr><td>Email</td><td><?php echo ": ".$detailuser->email;?></td></tr> 
  <tr><td>Bio</td><td><?php echo ": ".$detailuser->bio;?></td></tr>
 
  <tr><td>Tanggal Terdaftar</td><td><?php echo ": ".date("d/m/Y",$from_time)." - &#128344;".date("H:i",$from_time);?></td></tr>
  <tr><td>Jumlah Posting</td><td><?php
  foreach ($konten as $ktn) {
    if(strcmp($ktn->pembuat, $detailuser->usn)==0){
      $countp=$countp+1;
    }
  }

     echo ": ".$countp;?>
    <br>* <a href="<?php echo base_url().'home/searchuserpost/'."$detailuser->usn" ?>">lihat postingan >></a>
  </td></tr>
  <tr><td>Jumlah Komentar</td>
    <?php  
     foreach ($komentar as $kmn) {  
      if(strcmp(ucfirst($detailuser->usn), ucfirst($kmn->nama))==0){
      $countk=$countk+1;
      }
    }?>
    <td><?php echo ": ".$countk; ?> </td></tr>
	</table>
  </div>

</div>
  </div>
