<!--  -->
<div class="row">
<!-- login -->
  <div class="col-sm-6">
  	  <div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">
    <span class="glyphicon glyphicon-bookmark"></span> Daftar Member</h3>    
	</div>

	<div class="panel-body">
		
  <div id="users">
  <input class="search" placeholder="Search" />
  <button class="sort" data-sort="name">
    Sort by name
  </button>
  <button class="sort" data-sort="logged_in">
    Sort by online
  </button>
  <table class="table table-hover">
    <!-- IMPORTANT, class="list" have to be at tbody -->

    <th>Usn</th>
        <th>Email</th>
        <th>Online</th>
        <th>Level</th>
        <th>Registered</th>
        <th>Email</th>
        <th>Action</th>

    <tbody class="list">

     <?php foreach ($member as $user) {

        ?>
      <tr>
        <td class="name"><?php echo $user->usn; ?></td>
        <td class="email"><?php echo $user->nama; ?></td>
        <td class="logged_in"><?php echo $user->logged_in; ?></td>
        <td class="level"><?php echo $user->level; ?></td>
        <td class="tgl"><?php echo $user->tgl_terdaftar; ?></td>
        <td class="email"><?php echo $user->email; ?></td>

        <td>
          <?php
          if(strcmp($user->usn, "anonymous")!=0){ ?>
          <a href="<?php echo base_url('admin/deleteuser/'.$user->id_user); ?>" onclick="return confirm('Anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-remove"></span></a>
          <a href="<?php echo base_url('home/edituser/'.$user->id_user); ?>" onclick="return confirm('Anda yakin ingin mengedit?')"><span class="glyphicon glyphicon-pencil"></span></a>
          <?php 
          }
          ?>
        </td>
        
      </tr>
    
      <?php
      }
      ?>
  
    </tbody>

  </table>
 <center><ul class="pagination"></ul></center>
  <script type="text/javascript">
    var options = {
  valueNames: [ 'name', 'logged_in', 'email','level' , 'tgl','email'],
    page: 5,
  pagination: true
};

var userList = new List('users', options);
  </script>
</div>
  </div>
</div>
  </div>


<!-- 

       -->