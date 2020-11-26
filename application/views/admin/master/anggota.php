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
          <h5 class="panel-title">Data Anggota</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>

        <hr>
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Username</th>
              <th>Nama Anggota</th>
              <th>Email</th>
              <th>Telp</th>
              <th>Alamat</th>
              <th>Tgl Daftar</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_anggota->result() as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->username; ?></td>
                  <td><?php echo $baris->nama_anggota; ?></td>
                  <td><?php echo $baris->email; ?></td>
                  <td><?php echo $baris->telp; ?></td>
                  <td><?php echo $baris->alamat; ?></td>
                  <td><?php echo $baris->tgl_daftar; ?></td>
                  <td>
                    <a href="admin/anggota_hapus/<?php echo $baris->username; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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
