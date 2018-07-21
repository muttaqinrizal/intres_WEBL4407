<div class="col-md-6">
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">
    <span class="glyphicon glyphicon-bookmark"></span> Daftar Member</h3>    
  </div>

  <div class="panel-body">
     
              <form  method="post" role="form" action="<?php echo base_url('home/tambahuser'); ?>">
                <div class="form-group">
                <label for="">Level</label><br>
                <input type="radio" name="level" value="admin"> Admin</label><br>
                <input type="radio" name="level" value="user"> User</label>
                </div>
                <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="usn" id="usn" class="form-control input-sm">
                </div>
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="">Nama Depan</label>
                      <input type="text" name="fname" id="fname" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="">Nama Belakang</label>
                      <input type="text" name="lname" id="lname" class="form-control input-sm" oninput="generateFullName()">
                    </div>
                  </div>
                </div>
                <input type="hidden" id="nama" name="nama">

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" id="email" class="form-control input-sm">
                </div>

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control input-sm" id="password" name="password" required>
                    </div>
                  </div>

                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" class="form-control input-sm"  type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="">Bio</label>
                  <textarea class="form-control" id="bio" name="bio" rows="3" ></textarea>
                </div>

                <input type="submit" value="Register" class="btn btn-info btn-block">
              
              </form>
          
        </div>
       
  
    </div>

 </div>     

  <script type="text/javascript">


    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

<script type="text/javascript">
 function generateFullName()
   {
        document.getElementById('nama').value = 
        document.getElementById('fname').value + ' ' + 
        document.getElementById('lname').value;
   }

  </script>


    