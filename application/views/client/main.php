
<div class="row">
<!-- login -->
  <div class="col-sm-6">
  <div id="test-list">
  <b>&emsp;&emsp;&emsp;Cari : </b><em><input placeholder=" Kata Kunci" type="text" class="fuzzy-search" /></em>
  <div class="btn-group">
  <button type="button" class="btn btn-primary sort" data-sort="name"><i class="glyphicon glyphicon-sort"></i> Judul</button>
  <button type="button" class="btn btn-primary sort" data-sort="waktu"><i class="glyphicon glyphicon-sort"></i> Waktu</button>
  <button type="button" class="btn btn-primary sort" data-sort="tanya"><i class="glyphicon glyphicon-sort"></i> Tipe</button>
  </div>

  <br>
  <ul class="list">
    <?php foreach($konten as $db):
    if($db->post=='Y'){
    $to_time = strtotime("now");
    $from_time = strtotime("$db->tgl_dibuat");

    $time_ago = ' ';
    $time = time() - $from_time; // to get the time since that moment
    $tokens = array (
    31536000 => 'tahun',2592000 => 'bulan',604800 => 'minggu',86400 => 'hari',3600 => 'jam',
    60  => 'menit',1 => 'detik');
    foreach ($tokens as $unit => $text) {
    if ($time < $unit)continue;
    $numberOfUnits = floor($time / $unit);
    $time_ago = ' '.$time_ago. $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'').'  ';
    $time = $time % $unit;
    }
  // kategori select
    // foreach($kategori as $kat): 
    // if($db->kategori==$kat->id_kat){$select_kat=$kat->nama_kat;}
    // endforeach;

  // tipe select
    foreach($tipe as $tp): 
    if(strcmp($db->tipe, $tp->nama_tipe)==0){$select_tipe=$tp->nama_tipe;}
    endforeach;
  // cek jumlah komentar
    $jmlkomentar=0;
    foreach($komentar as $jmlc): 
    if($db->idkonten==$jmlc->id_konten){
      $jmlkomentar=$jmlkomentar+1;
    }
    endforeach;
  // else if mewarnai
    if($select_tipe=="Info"){
      $stylecol="list-group-item-light";
    }else{
       $stylecol="list-group-item-warning";
    }
    ?>
  <!-- pewarnaan treat -->
  <li class="list-group-item <?php echo $stylecol; ?>">
  <?php if($select_tipe=="Info"){ ?><a href="<?php echo base_url().'home/searchtag/'."Info" ?>" class="text-success tanya"><b>[<?php echo $select_tipe;?>]</b></a>
  <?php } else if($select_tipe=="Tanya") {?><a href="<?php echo base_url().'home/searchtag/'."Tanya" ?>" class="text-danger tanya"><b>[<?php echo $select_tipe;?>]</b></a><?php } ?>
  <!-- judul -->
    <a class="name" href="<?php echo base_url().'home/detailkonten/'.$db->idkonten; ?>"><b class="text-primary"><?php echo $db->judul; ?></b></a>
  <!-- tgl -->
    <small><span class="waktu" style="float:right;">&emsp; &#128344; <?php echo date("d/m/Y",$from_time)." - ".date("H:i",$from_time); ?>
    </span></small>
  <!-- nama waktu -->
    <br><small><span class="glyphicon glyphicon-pencil small"></span><?php echo "<span class=pembuat>".$db->pembuat."</span>"; ?> - <?php echo $time_ago;?></small>
    
  <!-- kategori -->
   <!--  <span class="badge kategori"><?php echo $select_kat;?></span> -->

  <!-- like comment -->
    <a href="<?php echo base_url().'home/vote/'.$db->idkonten; ?>" class="float-right"><br>👍 <span class="badge"><?php echo $db->vote; ?></span></a> #<b><?php echo $jmlkomentar." komentar "; ?><span>#<?php echo $db->pengunjung." views"; ?></span></b> 
    <?php  
      $myArray = explode(',', $db->tag);
      $string = str_replace(array('[',']'),'',$myArray);
      foreach ($string as $value) {
       ?>
        <a href="<?php echo base_url().'home/searchtag/'."$value" ?>"><span style="float: right;" class="badge kategori"><?php echo $value;?></span></a>

       <?php
      }
//        $arr = [];
// preg_replace_callback('/\[(.*?)\]/', function($m) use (&$arr){
//     $arr[] = explode(',',preg_replace('/([\w]+)/', "[$1]", $m[1]));
// }, $db->tag);
// print_r($arr);
      ?>
      </li>
    <?php 
  }
  endforeach; 

    ?>

    </ul>
    <center><ul class="pagination"></ul></center>
  </div>

  <script type="text/javascript">
   var monkeyList = new List('test-list', {
  valueNames: ['name','pembuat','tanya','kategori','waktu'],
  page:10,
  pagination: true
  });
  </script>
  </div>
