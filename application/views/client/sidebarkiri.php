<div class="col-sm-3">
  <?php
if($this->session->flashdata('loginstat')) {
$message = $this->session->flashdata('loginstat'); 
if(strcmp($message,"sukses") == 0){
 ?> <div class="alert alert-info">
 </strong><?php echo '<strong>Hai , '.$this->session->userdata('usn').'</strong>'; ?>
</div><?php
}else{
   ?> <div class="alert alert-warning">
 </strong><strong>Silahkan login terlebih dahulu</strong>
</div><?php
  }
}
?>
<div class="panel panel-default">
  <div class="panel-heading">Log In</div>
  <div class="panel-body">
  <form method="post" role="form" action="<?php echo base_url('home/login'); ?>">
  <div class="form-group">
    <label for="user">User :</label>
    <input type="text" class="form-control" id="usn" name="usn">
  </div>
  <div class="form-group">
    <label for="pwd">Password :</label>
    <input type="password" class="form-control" id="pass" name="pass">
  </div>
  <button type="submit" class="btn btn-info">Masuk</button>
  <br> Belum punya akun? 
  <a href="" data-toggle="modal" data-target="#myModal">Daftar</a>
  
  </form>
</div>
</div>
<!--  -->
   </div>
