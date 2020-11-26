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
          <h5 class="panel-title">Data Pemesanan</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>

        <hr>
        <?php
        echo $this->session->flashdata('msg');
        ?>
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Kode Pemesanan</th>
              <th>Bukti Pembayaran</th>
              <th>Jumlah dipesan</th>
              <th>Total Harga</th>
              <th>Tgl Pemesanan</th>
              <th>Status</th>
              <th class="text-center">Detail</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_pemesanan->result() as $baris) {
                $data = $this->db->query("SELECT * FROM tbl_anggota WHERE username='$baris->username'")->row();
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->kd_pemesanan; ?></td>
                  <td>
                    <a href="<?php echo $baris->foto; ?>" target="_blank">
                      <img src="<?php echo $baris->foto; ?>" alt="" width="100">
                    </a>
                  </td>
                  <td><?php echo $baris->jumlah_dipesan; ?></td>
                  <td>Rp. <?php echo number_format($baris->total,0,",","."); ?></td>
                  <td><?php echo $baris->tgl_pemesanan; ?></td>
                  <td>
                    <?php
                    if ($baris->konfirmasi == "belum") {?>
                      <label class="label label-danger">Menunggu Konfirmasi Admin</label>
                    <?php
                    }else{ ?>
                      <?php
                      if ($baris->status == "sukses") {?>
                        <label class="label label-success">Barang Sudah Sampai</label>
                      <?php
                      }else{ ?>
                        <label class="label label-warning">Proses Pengiriman</label>
                      <?php
                      } ?>
                    <?php
                    } ?>
                  </td>
                  <td>
                    <center>
                      <a href="web/pemesanan_detail/<?php echo $baris->kd_pemesanan; ?>" title="Detail Pemesanan"><span class="icon-eye"></span></a>
                    </center>
                  </td>

                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
