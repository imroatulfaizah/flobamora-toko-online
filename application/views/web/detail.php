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
          <h2>Pencarian tidak ditemukan . . .</h2>
          <hr>
          <a href="">Halaman Utama</a>
        </center>
      <?php
      }

      $baris = $v_barang->row();
      ?>

        <div class="col-md-4">
          <div class="panel panel-default">
                <img src="<?php echo $baris->foto; ?>" alt="" width="252" height="252">
          </div>
        </div>
        <div class="col-md-8">
          <form action="" method="post">
            <input type="hidden" name="id_barang" value="<?php echo $baris->id_barang; ?>">
          <b style="font-size:20px;"> <?php echo ucwords($baris->nama_barang); ?> </b>
          <hr style="margin:0px;margin-bottom:10px;">
          Kategori : <?php echo $baris->nama_kategori; ?>
          <br>
          Stok : <?php echo $baris->jumlah_barang; ?>
          <br>
          <b style="font-size:20px;float:right;">Rp. <?php echo number_format($baris->harga_barang,0,",","."); ?> </b>
          <br>
          <hr>
          <b>Deskripsi :</b>
          <br>
           <?php echo $baris->deskripsi; ?>
           <br><br>
          <!--<a href="#" class="btn btn-default" style="background-color:#222;color:white;float:right;">Beli</a>-->
          <?php
          $ceks = $this->session->userdata('user@pertanian');
      		if(isset($ceks)) {?>
            <button type="submit" name="btnbeli" class="btn btn-default" style="float:right;margin-right:10px;background-color:#222;color:white;"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</button>
          <?php
          }else{ ?>
            <a href="#log" data-toggle="modal" data-target="#log" class="btn btn-default" style="float:right;margin-right:10px;background-color:#222;color:white;"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</a>
          <?php
          } ?>
          </form>
        </div>

    </div>
  </div>
</div>

	<div class="col-md-3">
		<?php $this->load->view('web/widget');?>
	</div>


<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-equalizer"></span> <b>Populer</b></div>
    <div class="panel-body">

      <?php
      foreach ($v_populer->result() as $baris) {?>
        <div class="col-md-2">
          <div class="panel panel-default">
              <a href="detail/<?php echo $baris->id_barang; ?>">
                <div class="panel-body" style="padding:10px;background-color:gray;color:white;">
                  <b><?php echo $baris->nama_barang; ?> </b>
                </div>
                <img src="<?php echo $baris->foto; ?>" alt="" width="164" height="164">
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
  </div>
</div>
