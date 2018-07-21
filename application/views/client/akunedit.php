
<div class="row">
<!-- login -->
  <div class="col-sm-6">
  	  <div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">
    <span class="glyphicon glyphicon-bookmark"></span> Edit User</h3>    
	</div>

	<div class="panel-body">
 
      <form  method="post" role="form" action="<?php echo base_url('home/updateakun/'.$detailuser->usn); ?>">
      <table class="table">
      <input type="hidden" name="id" value="<?php echo $detailuser->id_user ?>">
      <input type="hidden" name="level" value="<?php echo $detailuser->level ?>">
      <tr>
      <td>Username</td>
      <td>: <input type="text" name="usn" value="<?php echo $detailuser->usn ?>"></td>
    </tr>
      <tr>
      <td>Nama</td>
      <td>: <input type="text" name="nama" value="<?php echo $detailuser->nama ?>"></td>
      </tr>
      <tr>
      <td>Password</td>
      <?php $pass=base64_decode($detailuser->pass); 
      ?>
      <td>: <input type="Password" name="pass" value="<?php echo $pass; ?>"></td>
      </tr>
      <tr>
      <td>Email</td>
      <td>: <input type="text" name="email" value="<?php echo $detailuser->email ?>"></td>
      </tr>
      <tr>
      <td>Bio</td>
      <td>: <textarea rows="4" name="bio" cols="40"><?php echo $detailuser->bio; ?></textarea></td>
      </tr>
      </table>
      <input type="submit" value="Update" class="btn btn-info btn-block">
      </form>
	
  </div>

</div>
  </div>

