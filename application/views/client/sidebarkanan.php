  <div class="col-sm-2">
       <h4>Diskusi Teratas</h4>
     <!--  
        <?php 
        $jml=0;
         foreach($konten as $ktn){
            foreach($diskusiteratas as $dt){
            if($ktn->idkonten==$dt->id_konten){
              $jml=$jml+1;
            }
            }
            echo $ktn->idkonten." ";
            echo $jml."<br>";
            $jml=0;
         }
        ?>-->

           <?php
           foreach($diskusiteratas as $dt){
           ?>
          <a href="<?php echo base_url().'home/detailkonten/'.$dt->idkonten;?>" class="list-group-item"><?php echo $dt->judul ?></a>
          <?php
           }
           ?>

        <br><h4>Paling Banyak Dilihat</h4>
        
        <?php 
        foreach($kontendisc as $db):?>
        <a href="<?php echo base_url().'home/detailkonten/'.$db->idkonten;?>" class="list-group-item"><?php echo $db->judul ?></a>
        <?php
        endforeach;
        ?></td>
        </td>
      </tr>

     </table>
     <BR>
     <?php 
     $jml_pengunjung=0;
     foreach ($konten as $ktn) {
       $jml_pengunjung=$ktn->pengunjung+$jml_pengunjung;
     } 
     ?>
     <ul class="list-group">
  <li class="list-group-item list-group-item-info"><?php echo "<center><B>".$jml_pengunjung."</b><br>Pengunjung</center>";?></li>
    
  </ul>
    </div>

</div>