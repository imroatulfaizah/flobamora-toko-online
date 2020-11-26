<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
     <span class="glyphicon glyphicon-shopping-cart"></span> Proses Pembelian
   </div>
    <div class="panel-body">

    <form action="" method="post" enctype="multipart/form-data">

      <table border="0" width="100%">
        <tr>
          <td width="25%">Kode Pemesanan</td>
          <td>: &nbsp;</td>
          <td>
            <b>
            <?php
              $un	= strtoupper($v_biodata->username);
      				$kd_pemesanan = date('Ymdhis')."$un";

              echo $kd_pemesanan; ?>
            </b>
            <input type="hidden" name="kd_pemesanan" value="<?php echo $kd_pemesanan; ?>">
          </td>
        </tr>
        <tr>
          <td width="15%"><br> Nama</td>
          <td>:</td>
          <td><?php echo $v_biodata->nama_anggota; ?></td>
        </tr>
        <tr>
          <td width="15">Alamat</td>
          <td>:</td>
          <td>
            <textarea name="alamat" rows="2" cols="80" class="form-control" required><?php echo $v_biodata->alamat; ?></textarea>
          </td>
        </tr>
      </table>

      <hr>
    <?php
    if ($v_barang->num_rows() == 0) {?>
        <center>
          <h2><span class="glyphicon glyphicon-shopping-cart"></span> Pemesanan Kosong . . .</h2>
          <hr>
          <a href="">Halaman Utama</a>
        </center>
      <?php
    }else{?>


      <table class="table">
        <tr style="background-color:#222;color:white;">
          <th width='10'>No.</th>
          <th>Nama Barang</th>
          <th>Jumlah Pesan</th>
          <th>Harga Barang</th>
          <th>Jumlah Harga</th>
          <th width="10"></th>
        </tr>
      <?php
      $i=1;
      foreach ($v_barang->result() as $baris) {
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td>
            <a href="detail/<?php echo $baris->id_barang; ?>">
              <img src="<?php echo $baris->foto; ?>" alt="" width="50" class="img-responsive">
              <?php echo $baris->nama_barang; ?>
            </a>
          </td>
          <td align="center">
              <input type="hidden" name="id_keranjang_<?php echo $i;?>" value="<?php echo $baris->id_keranjang; ?>">
              &nbsp; <?php echo $baris->jumlah_dipesan; ?> &nbsp;
          </td>
          <td>Rp. <?php echo number_format($baris->harga_barang, 0, ",","."); ?></td>
          <td>Rp. <?php echo number_format($baris->harga_barang * $baris->jumlah_dipesan, 0, ",","."); ?></td>
        </tr>
        <?php
        $i++;
      } ?>

        <tr style="background-color:#f1f1f1;color:#222;">
          <th colspan="1"><?php //echo $v_barang->num_rows(); ?>-</th>
          <th>-</th>
          <th style="text-align:center;"><?php echo $v_sum_barang->total_pesan; ?></th>
          <th>Rp. <?php echo number_format($v_sum_barang->total_harga_barang, 0,",","."); ?></th>
          <th>Rp. <?php echo number_format($v_sum_barang->total_harga, 0,",","."); ?></th>
          <th></th>
        </tr>
      </table>

      <hr>

      <b>
        Kurir : JNE <br>
        Ongkos Kirim : Rp. 22.000
      </b>
      <h2>
        Sub Total : Rp. <?php echo number_format($v_sum_barang->total_harga, 0, ",","."); ?> <br>
        Total yang harus dibayar : Rp. <?php echo number_format(($v_sum_barang->total_harga) + 22000, 0, ",","."); ?>
      </h2>

      <hr>
      <b>
        BANK TRANSFER : xxx <br>
        No.Rek : xxx
      </b>
      <hr>
      <b>
        Upload Foto Bukti Pembayaran : <input type="file" name="foto" value="" class="form-control" required>
      </b>
      <br><br>
        <input type="hidden" name="jumlah_dipesan" value="<?php echo $v_sum_barang->total_pesan; ?>">
        <input type="hidden" name="harga_barang" value="<?php echo $baris->harga_barang; ?>">
        <input type="hidden" name="jumlah_harga" value="<?php echo $v_sum_barang->total_harga; ?>">
        <input type="hidden" name="ongkir" value="22000">
        <input type="hidden" name="total" value="<?php echo ($v_sum_barang->total_harga) + 22000; ?>">

        <button type="submit" name="btnkirim" class="btn btn-lg btn-warning" style="float:right;width:100%;font-size:20px;">Kirim</button>
      </form>
      <?php
    } ?>
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
