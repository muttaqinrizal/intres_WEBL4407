<div class="col-sm-3">

<div class="panel-group">

<a href="<?php echo base_url().'admin/' ?>"><button class="accordioncustom">Dashboard</button></a>

<button class="accordioncustom">Manage Konten</button>
<div class="panelcustomcustom">
      <a href="<?php echo base_url().'admin/aturkonten/' ?>" class="list-group-item" style="border: 0;">Atur Konten</a>
      <a href="<?php echo base_url().'home/formposting/' ?>" class="list-group-item"  style="border: 0;">Tambah Konten</a>
</div>

<button class="accordioncustom">Managemen Member</button>
<div class="panelcustomcustom">
    <a href="<?php echo base_url().'admin/atur_member/' ?>" class="list-group-item" style="border: 0;">Atur Member</a>
      <a href="<?php echo base_url().'admin/add_member/' ?>" class="list-group-item"  style="border: 0;">Tambah Member</a>

</div>

<script>
var acc = document.getElementsByClassName("accordioncustom");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panelcustom = this.nextElementSibling;
    if (panelcustom.style.maxHeight){
      panelcustom.style.maxHeight = null;
    } else {
      panelcustom.style.maxHeight = panelcustom.scrollHeight + "px";
    } 
  });
}
</script>
    

     </div>

