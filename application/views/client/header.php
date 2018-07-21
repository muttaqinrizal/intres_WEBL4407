<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->


   <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" /> 

   <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/profile.css" type="text/css" media="screen" /> 

   <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-theme.min.css" type="text/css" media="screen" /> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.modal.js"></script>
<!--   <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script> -->

  <!-- editor -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/list.min.js"></script>

    <link type="text/css" rel="stylesheet" src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.css">
   
    <!-- Custom styles for this template -->
    <style type="text/css">
      @font-face {
  font-family: 'Glyphicons Halflings';
  src: url('<?php echo base_url();?>assets/bootstrap/fonts/glyphicons-halflings-regular.eot');
  src: url('<?php echo base_url();?>assets/bootstrapfonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
}
.accordioncustom {
    background-color: #0067B3;
    color: #fff;
     border-radius: 10px;
    cursor: pointer;
    padding: 5%;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 100%;
    transition: 0.4s;
    margin-bottom: 1%;
}

.activecustom, .accordioncustom:hover {
    background-color: #00216C;
}

.panelcustomcustom {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
.circle {
  width: 70%;
  height: 70%;
  border-radius: 100%;
  font-size: 400%;
  color: #fff;
  line-height: 300%;
  text-align: center;
  background: #000
}

.circle2{
   width: 105%;
  height: 50%;
  border-radius: 100%;
  font-size: 100%;
  color: #fff;
  padding-right: 10%;
  line-height: 200%;
  text-align: center;
  background: #666666;
}


    </style>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.js"></script>
  </head>
  <body>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>home/">Int.Res</a>
    </div>
    <ul class="nav navbar-nav">
       <?php 
      if($this->session->userdata('logged_in')==TRUE){
      ?>
      <li class="active"><a href="#"><small><span class="glyphicon glyphicon-user"></span></small> <?php echo ucfirst($this->session->userdata('usn')); ?></a></li>
      <?php
    }
      ?>
      <li><a href="<?php echo base_url(); ?>home/formposting">Posting</a></li>
     
    </ul>


     <ul class="nav navbar-nav navbar-right">

      <div class="navbar-form navbar-left">
      <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search">
      </div>
      <a onclick="link('search')" class="btn btn-default">Cari</a>
       <script type="text/javascript">
   function link(keyword){
      var key=document.getElementById(keyword).value;
      var url=key;
      window.location="<?php echo base_url(); ?>home/search/"+key;
   } 
  </script>

    </div>
    <?php 
      if($this->session->userdata('logged_in')==TRUE){
      ?>
       <li><a href="<?php echo base_url(); ?>home/logout"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
       <?php } ?>
    </ul>
  </div>
</nav>

<?php
if($this->session->flashdata('managenotif')) {
$message = $this->session->flashdata('managenotif'); 
if(strcmp($message,"hapus")==0){?> 
<div class="alert alert-warning">
 </strong><strong><center><?php echo "hapusnya berhasil"; ?></center></strong>
</div><?php
  }else{?> 
<div class="alert alert-warning">
 </strong><strong><center><?php echo "editnya berhasil"; ?></center></strong>
</div>
<?php
  }
}
?>