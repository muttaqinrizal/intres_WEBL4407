<div class="col-md-6">
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">
    <span class="glyphicon glyphicon-bookmark"></span> Edit Member</h3>    
  </div>

  <div class="panel-body">
  
      <form  method="post" role="form" action="<?php echo base_url('home/updateakun/'.$useredit->usn); ?>">
      <table class="table">
      <tr>
        <td>
          Autorisasi
        </td>
        <td>
          <input type="radio" name="level" value="admin" <?php if(strcmp($useredit->level, "admin")==0){ echo "checked";} ?>> Admin
          <br><input type="radio" name="level" value="user" <?php if(strcmp($useredit->level, "user")==0){ echo "checked";} ?>> User
        </td>
      </tr>
      <input type="hidden" name="id" value="<?php echo $useredit->id_user ?>">
      <tr>
      <td>Username</td>
      <td>: <input type="text" name="usn" value="<?php echo $useredit->usn ?>"></td>
    </tr>
      <tr>
      <td>Nama</td>
      <td>: <input type="text" name="nama" value="<?php echo $useredit->nama ?>"></td>
      </tr>
      <tr>
      <td>Password</td>
      <?php $pass=base64_decode($useredit->pass); 
      ?>
      <td>: <input type="Password" name="pass" value="<?php echo $pass ?>"></td>
      </tr>
      <tr>
      <td>Email</td>
      <td>: <input type="text" name="email" value="<?php echo $useredit->email ?>"></td>
      </tr>
      <tr>
      <td>Bio</td>
      <td>: <textarea rows="4" name="bio" cols="40"><?php echo $useredit->bio; ?></textarea></td>
      </tr>
      </table>
      <input type="submit" value="Update" class="btn btn-info btn-block">
      </form>          
  
  </div>

 </div>     

  