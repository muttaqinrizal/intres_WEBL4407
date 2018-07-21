
<?php
if(strcmp($this->session->userdata('lvl'), "user")==0) {
echo "<div class=col-sm-3>";
}

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
  <div class="panel-heading">PROFIL</div>
 <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <!-- <div class="profile-userpic">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl7FYDxS_qnwohxPcmgepevfryU2KGmnwZwPgY8Kawm9Xxu1mX" alt="" class="img-responsive">
        </div> -->
        <center><div class="circle"><?php echo ucfirst(substr($user->usn, 0, 3)); ?> 
        </div></center>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
           <?php echo $user->nama; ?>
          </div>
          <div class="profile-usertitle-job">
            <?php echo $this->session->userdata('lvl'); ?>
          </div>
          <hr width="80%" >
          <div class="profile-usertitle-bio">
            <?php echo "'' ".$user->bio." ''"; ?>
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
       <!--  <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm">Follow</button>
          <button type="button" class="btn btn-danger btn-sm">Message</button>
        </div> -->
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <a href="<?php echo base_url().'home/detailuser/'.$user->usn; ?>">
              <i class="glyphicon glyphicon-home"></i>
              Overview </a>
            </li>
            <li>
              <a href="<?php echo base_url().'home/editakun/'.$user->usn; ?>">
              <i class="glyphicon glyphicon-user"></i>
              Account Edit </a>
            </li>
            <li>
              <a href="<?php echo base_url().'home/managekonten/'.$user->usn; ?>">
              <i class="glyphicon glyphicon-th-list"></i>
              Atur Posting </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>

</div>
<!--  -->
   </div>
