<div class="row">

  <div class="col-sm-7">
<?php 
  	if (isset($key)){?>
  	<h3>Hasil Pencarian :<?php echo " '".$key."' "; ?></h3>
	<br>
<?php } 
if(empty($cari)){
		echo "<h3>Maaf, tidak ditemukan.. ";
	}
else{
?>
	<div id="users">
  <input class="search" placeholder="Search" />
  <button class="sort" data-sort="judul">
    Sort by judul
  </button>
   <button class="sort" data-sort="tgl">
    Sort by tanggal
  </button>
	<table class="table">
	<thead>
		<th>Judul</th>
		<th>Tag</th>
		<th>Oleh</th>
		<th>Tipe</th>
		<th>Tanggal Diposting</th>

	</thead>

    <tbody class="list">
	<?php

	foreach ($cari as $search) {
	?>
	<tr>
	<td class="judul">
	<a class="name" href="<?php echo base_url().'home/detailkonten/'.$search->idkonten; ?>"><b class="text-primary"><?php echo $search->judul; ?></b></a>
	</td>
	<td class="tag">
	<?php
	  $myArray = explode(',', $search->tag);
      $string = str_replace(array('[',']'),'',$myArray);
      foreach ($string as $value) {
       ?>
        <a href="<?php echo base_url().'home/caritag/'.$value ?>"><span class="badge kategori"><?php echo $value;?></span></a> 
       <?php
      }	
      ?>	
	</td>
	<td class="pembuat">
	<?php echo $search->pembuat; ?>	
	</td>
	<td class="tanya">
	<?php 
	if(strcmp($search->tipe, "Tanya")==0){
		echo "Pertanyaan";
	}else{
		echo "Informasi";
	}
	?>
	</td>
	<td class="tgl">
	<?php echo $search->tgl_dibuat; ?>
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
  valueNames: [ 'judul', 'tag', 'pembuat','tanya','tgl'],
    page: 10,
  pagination: true
};

var userList = new List('users', options);
  </script>
  </div>
</div>
<?php } ?>
<!-- 
				
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script> -->