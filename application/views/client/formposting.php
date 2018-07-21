<div class="row">
  <div class="col-sm-7">
  	<h3>Posting </h3>
	
	<form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('home/posting/'.$status); ?>" >
	<table class="table table-responsive">
	<tr>
	<div class="row">
	</div>	<td>Tipe</td>
			<td>
			<input type="hidden" name="id_konten" value="<?php if(isset($konten)){ echo $konten->idkonten; } ?>">
			<?php foreach($tipe as $tp): 
			if(isset($konten)){
			$selected = (strcmp($konten->tipe, $tp->nama_tipe)==0) ? "checked" : "";
			}
			?>
			<label><input type="radio" name="tipe" value="<?php echo $tp->nama_tipe; ?>" <?php if(isset($selected)){ echo $selected; } ?>><?php echo $tp->nama_tipe; ?></label>
				<?php endforeach; ?>
			</td>
		</tr>

	<tr>
		<td>Judul </td>
		<td><input type="text" name="judul" size="40" value="<?php if(isset($konten)){ echo $konten->judul; } ?>" /> *</td>
	</tr>
<!-- 
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
	</tr> -->
	

	<tr>
		<td valign="top">Konten Details : </td>
		<td>
			<textarea class="form-control ckeditor" name="deskripsi"><?php if(isset($konten)){ echo $konten->deskripsi; } ?></textarea>		
		</td>
	</tr>
	
	<tr>
		<input type="hidden" value="<?php if(isset($konten)){ echo $konten->pembuat; 
		}else{
		echo $this->session->userdata('usn'); 
		}
		?>" name="pembuat" size="40" />
	</tr>
	<tr>
		<td>Post :</td>
		<td><label><input type="radio" name="post" value="Y" <?php if(isset($konten->post)&&($konten->post=='Y')){ echo "checked";  } ?>>Ya</label> <label> <input type="radio" name="post" value="N" <?php if(isset($konten->post)&&($konten->post=='N')){ echo "checked";  } ?>>Tidak</label></td>
	</tr>
	<tr>
		<td>
			tags
		</td>	
		<td>
		<div class="bs-example">
        <input type="text" value="<?php if(isset($konten)){ echo $konten->tag; } ?>" data-role="tagsinput" id="blog_tags" name="blog_tags" /> <small>*) isi kemudian klik di area manapun untuk menambahkan</small>
		</td>
	</tr>
	<tr><td></td>
		<td colspan="2">
	<center><input type="submit" name="add" value="Tambah"></center>
		</td>
	</tr>
</table>
</form>		
			
  </div>
</div>
<!-- 
				
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script> -->