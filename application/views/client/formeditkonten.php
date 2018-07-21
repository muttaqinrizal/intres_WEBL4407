<div class="row">

  <div class="col-sm-7">

  	<h3>Posting </h3>
	
	<form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('home/posting'); ?>" >
	<table class="table table-responsive">
	<tr>
	<div class="row">
	</div>	<td>Tipe</td>
			<td>
			<?php foreach($tipe as $tp):
			if(isset($konten)){
			$selected = ($tp->id_tipe==$konten->tipe) ? "checked" : "";
			}
// echo "<option value='$hasil[id_artist]' $selected>$hasil[nm_artist]</option>";
// }
			?>
			<label><input type="radio" name="tipe" value="<?php echo $tp->id_tipe; ?>" <?php if(isset($konten)){ echo $selected; } ?>><?php echo $tp->nama_tipe; ?></label>
				<?php endforeach; ?>
			</td>
		</tr>

	<tr>
		<td>Judul </td>
		<td><input type="text" name="judul" value="<?php  if(isset($konten)){ echo $konten->judul; } ?>" size="40" /> *</td>
	</tr>

	<tr>
		<td>Kategori </td>
		<td>
			<select name="kategori">
				<option value="#">- Pilih -</option>
				<?php foreach($kategori as $db): ?>
				<option value="<?php echo $db->id_kat; ?>"><?php echo $db->nama_kat; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
	

	<tr>
		<td valign="top">Konten Details : </td>
		<td>
			<textarea class="form-control ckeditor" name="deskripsi"></textarea>		
		</td>
	</tr>
	<tr>ssss
		<input type="text" value="<?php if(strcmp($this->session->userdata('lvl'), "admin")!=0) echo $this->session->userdata('usn'); ?>" name="pembuat" size="40" />
	</tr>

	<tr>
	<td>
	<label>Tags (type and press 'Enter')</label><br/>
    <textarea name="blog_tags" id="blog_tags" rows="5" cols="50" class="textarea"></textarea>
    <script type="text/javascript">
    $('#blog_tags')
        .textext({
          plugins: 'tags',
    	  tagsItems: [<?php
        if (isset($blog_tags)) {
            $i = 1;
            foreach ($blog_tags as $tag) {
                echo "'" . $tag . "'";
                if (count($blog_tags) == $i) {
                    echo '';
                } else {
                    echo ',';
                }
                $i++;
            }
        }
        ?>]
           })
           .bind('tagClick', function (e, tag, value, callback) {
             var newValue = window.prompt('Enter New value', value);
             if (newValue)
             callback(newValue);
             });
    </script>
	</td>
	</tr>
	<tr>
		<td>Post :</td>
		<td><label><input type="radio" name="post" value="Y" checked>Ya</label><label><input type="radio" name="post" value="N">Tidak</label></td>
	</tr>


	<tr>
		<td colspan="2">
			<input type="submit" name="add" value="Tambah">
		</td>
	</tr>
</table>
</form>		
			
  </div>
</div>
<!-- 
				
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script> -->