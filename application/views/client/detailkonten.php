<div class="row">
  <div class="col-sm-8">
  	  
  	<h3><?php echo $konten->judul; ?></h3>
    <p class="lead"><i class="fa fa-user"></i> by <a href="<?php echo base_url().'home/detailuser/'.$konten->pembuat ?>"><?php echo  ucfirst($konten->pembuat); ?></a>
    </p>
<!-- 
    home/detailuser/anqi -->

    <hr><?php echo $konten->deskripsi; ?> 

    <p><em><i class="fa fa-calendar"></i>Diposting tanggal <?php 
       $from_time = strtotime("$konten->tgl_dibuat");
       echo date("d-m-Y",$from_time)." - Jam ".date("H:i",$from_time); 
      ?> 
    </em></p>
    <i class="fa fa-tags"></i> Tags: 
    <?php  
      $myArray = explode(',', $konten->tag);
      $string = str_replace(array('[',']'),'',$myArray);
      foreach ($string as $value) {
       ?>
         <a href="<?php echo base_url().'home/searchtag/'.$value ?>"><span class="label label-primary"><?php echo $value;?></span></a>
   
       <?php
      }
      ?>
  
    <hr> 


  
      <h3 ng-hide="newUser"><?php echo $jmlkomentar ?> Komentar</h3> 
    <ul class="nav nav-tabs" id="tabContent">
        <li class="active"><a href="#details" data-toggle="tab">Daftar Komentar</a></li>
        <li><a href="#formkomentar" data-toggle="tab">Tambah Komentar</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="details">
          <?php 
          echo ($jmlkomentar == 0 ? '<em><small>Belum ada komentar</small></em>' : '').'.';
          ?>
          <?php foreach($komentar as $kom): 
          $tgl = strtotime("$kom->tanggal");
          ?>
            <div class="media">
              <div class="media-left">
              <div class="circle2"><?php echo ucfirst(substr($kom->nama, 0, 3)); ?></div>
              </div>

              <div class="media-body">
                <h4 class="media-heading"><?php echo ucfirst($kom->nama); ?><small><i>  &emsp; &#128344; <?php echo date("H:i",$tgl)." - ".date("d/m/Y",$tgl); ?></i></small></h4>
                <p><?php echo "$kom->isi_komentar"; ?></p>
            </div>
            <div class="media-body">
              <?php if ($kom->solved=='Y'){ ?>
              <h4  style="color: green;"><b>Solusi Jawaban</b></h4> 
              <?php }
              if($this->session->userdata('usn')==$konten->pembuat&&$kom->solved=='N'){ ?>
              <a href="<?php echo base_url().'home/solved/'.$kom->id_komentar ?>"><span class="glyphicon glyphicon-check"></span>
              </a>
              <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?php echo base_url().'home/hapuskomen/'.$kom->id_komentar ?>"><span class="glyphicon glyphicon-trash"></span>
              </a>
              
              <?php
              }
              ?>
              </div>
          </div>
          <?php
          endforeach
          ?>

        </div>

        <div class="tab-pane" id="formkomentar">
          <!-- form komentar -->
          <?php $idk=$konten->idkonten; ?>
        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('home/submitkomentar/'.$idk); ?>" >
              <table class="table">
              <tr>
                <?php $user=$this->session->userdata('usn');?>
                <td>Nama </td>
                <td><input type="text" name="nama" size="40" value="<?php if(isset($user)) { echo $user; } else { echo "anonymous"; }?>" readonly/> *</td>
              </tr>
              <tr>
                <td valign="top">Isi Komentar : </td>
                <td>
                  <textarea class="form-control ckeditor" name="isikomentar" id="isikomentar"></textarea>  
                <script>
                CKEDITOR.replace('isikomentar');
                CKEDITOR.config.width="100%";
                CKEDITOR.config.height="100px"
                </script>  
                </td>
              </tr>
            <!--   <tr>
                <input type="hidden" value="<?php echo $this->session->userdata('usn'); ?>" name="pembuat" size="40" />
              </tr> -->
              <tr>
                <td colspan="2">
                  <input type="submit" name="add" value="Komentar">
                </td>
              </tr>
            </table>
            </form>   
        </div> 
    </div>
<!-- end modal -->


	</div>


			
