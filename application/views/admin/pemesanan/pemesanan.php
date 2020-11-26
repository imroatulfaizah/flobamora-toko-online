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
        <div class="table-responsive">
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Kode Pemesanan</th>
              <th>Bukti Pembayaran</th>
              <!--<th>Nama Anggota</th>
              <th>Jumlah dipesan</th>-->
              <th>Total Harga</th>
              <th>Tgl Pemesanan</th>
              <th>Konfirmasi Pemesanan</th>
              <th>Status</th>
              <th class="text-center">Detail</th>
              <th></th>
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
                  <!--<td><?php echo $data->nama_anggota; ?></td>
                  <td><?php echo $baris->jumlah_dipesan; ?></td>-->
                  <td>Rp. <?php echo number_format($baris->total,0,",","."); ?></td>
                  <td><?php echo $baris->tgl_pemesanan; ?></td>
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="kd_pemesanan_<?php echo $no; ?>" value="<?php echo $baris->kd_pemesanan; ?>">
                      <?php
                      if ($baris->konfirmasi == "belum") {?>
                        <input type="submit" name="btnya_<?php echo $no; ?>" class="btn btn-primary" onclick="return confirm('Anda Yakin?')" value="Ya?">
                      <?php
                      }else{ ?>
                        <input type="submit" name="btnbatal_<?php echo $no; ?>" class="btn btn-primary" onclick="return confirm('Anda Yakin?')" value="Batalkan?">
                      <?php
                      } ?>
                  </td>
                  <td>
                      <?php
                      if ($baris->konfirmasi == "belum") {?>
                        <input type="submit" name="" class="btn btn-primary" value="Proses . . ." disabled>
                      <?php
                      }else{ ?>
                        <?php
                        if ($baris->status == "sukses") {?>
                          <input type="submit" name="" class="btn btn-primary" value="Sukses" disabled>
                        <?php
                        }else{ ?>
                          <input type="submit" name="btnsampai_<?php echo $no; ?>" class="btn btn-primary" onclick="return confirm('Anda Yakin?')" value="Sudah Sampai?">
                        <?php
                        } ?>
                      <?php
                      } ?>
                    </form>
                  </td>
                  <td>
                    <center>
                      <a href="admin/pemesanan_detail/<?php echo $baris->kd_pemesanan; ?>" title="Detail Pemesanan"><span class="icon-eye"></span></a>
                    </center>
                  </td>
                  <td>
                    <center>
                      <a href="admin/pemesanan_hapus/<?php echo $baris->kd_pemesanan;?>" onclick="return confirm('Anda Yakin?')" title="Hapus"><span class="icon-trash"></span></a>
                    </center>
                  </td>

                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>

        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
