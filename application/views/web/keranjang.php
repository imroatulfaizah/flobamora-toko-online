<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
     <span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja
   </div>
    <div class="panel-body">
      <?php
    if ($v_barang->num_rows() == 0) {?>
        <center>
          <h2><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja Kosong . . .</h2>
          <hr>
          <a href="">Halaman Utama</a>
        </center>
      <?php
    }else{?>


      <table class="table">
        <tr style="background-color:#222;color:white;">
          <th width='10'>No.</th>
          <th>Nama Barang</th>
          <th>Stok</th>
          <th>Jumlah Pesan</th>
          <th>Harga Barang</th>
          <th>Jumlah Harga</th>
          <th>Tanggal</th>
          <th width="10"></th>
        </tr>
      <form action="" method="post">
      <?php
      $i=1;
      foreach ($v_barang->result() as $baris) {
        $cek_barang = $this->Mcrud->get_data_by_pk('tbl_barang', 'id_barang', $baris->id_barang)->row();
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td>
            <a href="detail/<?php echo $baris->id_barang; ?>">
              <img src="<?php echo $baris->foto; ?>" alt="" width="50" class="img-responsive">
              <?php echo $baris->nama_barang; ?>
            </a>
          </td>
          <td>
            <?php echo $cek_barang->jumlah_barang; ?>
          </td>
          <td align="center">
              <input type="hidden" name="id_barang_<?php echo $i;?>" value="<?php echo $baris->id_barang; ?>">
              <input type="hidden" name="id_keranjang_<?php echo $i;?>" value="<?php echo $baris->id_keranjang; ?>">
              <button type="submit" name="kurang_<?php echo $i;?>" <?php if ($baris->jumlah_dipesan <= 1){ echo "disabled";} ?> class="btn btn-info" style="padding:0px;">&nbsp; - &nbsp;</button>
              &nbsp; <?php echo $baris->jumlah_dipesan; ?> &nbsp;
              <button type="submit" name="tambah_<?php echo $i;?>" <?php if ($cek_barang->jumlah_barang <= 0){ echo "disabled";} ?> class="btn btn-info" style="padding:0px;">&nbsp; + &nbsp;</button>
          </td>
          <td>Rp. <?php echo number_format($baris->harga_barang, 0, ",","."); ?></td>
          <td>Rp. <?php echo number_format($baris->harga_barang * $baris->jumlah_dipesan, 0, ",","."); ?></td>
          <td><?php echo $baris->tgl_keranjang; ?></td>
          <td><button type="submit" name="hapus_<?php echo $i;?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')" style="padding:0px;">&nbsp; x &nbsp;</button></td>
        </tr>
        <?php
        $i++;
      } ?>
      </form>
        <tr style="background-color:#f1f1f1;color:#222;">
          <th colspan="1"><?php //echo $v_barang->num_rows(); ?>-</th>
          <th>-</th>
          <th>-</th>
          <th style="text-align:center;"><?php echo $v_sum_barang->total_pesan; ?></th>
          <th>Rp. <?php echo number_format($v_sum_barang->total_harga_barang, 0,",","."); ?></th>
          <th>Rp. <?php echo number_format($v_sum_barang->total_harga, 0,",","."); ?></th>
          <th colspan="2">-</th>
        </tr>
      </table>

      <form action="proses_beli" method="post">
        <button type="submit" name="btnbeli" class="btn btn-lg btn-warning" style="float:right;width:100%;font-size:20px;">Bayar Sekarang</button>
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
