<div class="row">
  <div class="col-sm-7">
  	<h3>Posting </h3>
	
	<form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('home/posting'); ?>" >
	<table class="table table-responsive">
	<tr>
	<div class="row">
	</div>	<td>Tipe</td>
			<td>
			<?php foreach($tipe as $tp): ?>
			<label><input type="radio" name="tipe" value="<?php echo $tp->id_tipe; ?>"><?php echo $tp->nama_tipe; ?></label>
				<?php endforeach; ?>
			</td>
		</tr>

	<tr>
		<td>Judul </td>
		<td><input type="text" name="judul" size="40" /> *</td>
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
	<tr>
		<input type="hidden" value="<?php echo $this->session->userdata('usn'); ?>" name="pembuat" size="40" />
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