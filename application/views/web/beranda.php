<div class="col-md-9">
  <?php
  echo $this->session->flashdata('msg');
  ?>
  <div class="panel panel-default">
    <!--<div class="panel-heading">
     <span class="glyphicon glyphicon-home"></span>
     Beranda
   </div>-->

    <div class="panel-body">

      <?php
      if ($v_barang->num_rows() == 0) {?>
        <center>
          <h2> <?php if (isset($_POST['btncari'])) {echo "Pencarian";}else{echo "Barang";} ?> tidak ditemukan . . .</h2>
          <hr>
          <a href="">Halaman Utama</a>
        </center>
      <?php
      }

      foreach ($v_barang->result() as $baris) {?>
        <div class="col-md-4">
          <div class="panel panel-default">
              <a href="detail/<?php echo $baris->id_barang; ?>">
                <div class="panel-body" style="padding:10px;background-color:mediumaquamarine;color:white;">
                  <b><?php echo ucwords($baris->nama_barang); ?> </b>
                </div>
                <img src="<?php echo $baris->foto; ?>" alt="" width="252" height="252">
              </a>
            <div class="panel-footer">
              <b>Rp. <?php echo number_format($baris->harga_barang, 0,",","."); ?></b>
              <div style="float:right;">
                <a href="detail/<?php echo $baris->id_barang; ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a>
              </div>
            </div>
          </div>
        </div>
      <?php
      } ?>


    </div>
    <center>
      <?php echo $halaman ?> <!--Memanggil variable pagination-->
    </center>
  </div>
</div>
