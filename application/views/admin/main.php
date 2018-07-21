
<div class="row">
<!-- login -->
  <div class="col-sm-6">
  	  <div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">
    <span class="glyphicon glyphicon-bookmark"></span> Statistik</h3>    
	</div>

	<div class="panel-body">
		
    <div class="col-md-3">
     <div class="well dash-box">
     	<?php
       $visitor=0;
       foreach ($konten as $db) {
       	 $visitor=$visitor+$db->pengunjung;
       }
      
       ?>
       <h2><span class="glyphicon glyphicon-list" aria-hidden="true"></span><br> <?php echo $visitor; ?></h2>

       <h4>Visitor</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php echo "<br>".$jmlkonten; ?></h2>
       <h4>Posting</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?php echo "<br>".$jmlonlen; ?></h2>
       <h4>Online</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo "<br>".$jmluser; ?></h2>
       <h4>Member</h4>
     </div>
   </div>
	</div>

	<center><a href="<?php echo base_url('home/'); ?>" class="btn btn-info" role="button">View Website</a></center>

</div>
  </div>

