<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Detail Pemesanan</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>

        <hr>


        <div class="container-fluid">
          <form action="" method="post" enctype="multipart/form-data">

            <table border="0" width="100%">
              <tr>
                <td width="15%">Kode Pemesanan</td>
                <td>: &nbsp;</td>
                <td>
                  <b>
                  <?php echo $v_pemesanan->kd_pemesanan; ?>
                  </b>
                </td>
              </tr>
              <tr>
                <td width="100">Nama</td>
                <td width="15">:</td>
                <td><?php echo $v_biodata->nama_anggota; ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                  <?php echo $v_biodata->alamat; ?>
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
              <center>
                Foto Bukti Pembayaran <br>
                <a href="<?php echo $v_pemesanan->foto; ?>" target="_blank"><img src="<?php echo $v_pemesanan->foto; ?>" alt="" width="200"></a>
              </center>
              <hr>
            </b>
            <br>
              <input type="hidden" name="jumlah_dipesan" value="<?php echo $v_sum_barang->total_pesan; ?>">
              <input type="hidden" name="harga_barang" value="<?php echo $baris->harga_barang; ?>">
              <input type="hidden" name="jumlah_harga" value="<?php echo $v_sum_barang->total_harga; ?>">
              <input type="hidden" name="ongkir" value="22000">
              <input type="hidden" name="total" value="<?php echo ($v_sum_barang->total_harga) + 22000; ?>">

              <!--<a href="admin/pemesanan" class="btn btn-lg btn-warning" style="float:right;font-size:20px;">Cetak</a>-->
              <a href="admin/pemesanan" class="btn btn-lg btn-default" style="float:left;font-size:20px;">Kembali</a>
            </form>
            <?php
          } ?>

        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
