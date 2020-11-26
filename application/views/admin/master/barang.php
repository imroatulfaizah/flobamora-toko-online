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
          <h5 class="panel-title">Tambah Barang</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="panel-body">
          <?php
          echo $this->session->flashdata('msg');
          ?>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Barang</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama_barang" class="form-control" value="" required maxlength="30">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kategori</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kategori" required>
                      <option value="">-- Pilih Kategori --</option>
                      <?php
                      foreach ($v_kategori->result() as $baris) { ?>
                        <option value="<?php echo $baris->id_kategori; ?>"><?php echo $baris->nama_kategori; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Harga Barang</label>
                  <div class="col-lg-10">
                    <input type="number" name="harga_barang" class="form-control" value="" required maxlength="11">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jumlah Barang</label>
                  <div class="col-lg-10">
                    <input type="number" name="jumlah_barang" class="form-control" value="" required maxlength="4">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Deskripsi</label>
                  <div class="col-lg-10">
                    <textarea name="deskripsi" rows="3" cols="80" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Foto Barang</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto" class="form-control" value="" required>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

        <hr>
        <div class="table-responsive">
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Harga Barang</th>
              <th>Jumlah Barang</th>
              <th>Deskripsi</th>
              <th>Dilihat</th>
              <th class="text-center" width="100"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_barang->result() as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->nama_barang; ?></td>
                  <td><?php echo $baris->nama_kategori; ?></td>
                  <td>Rp. <?php echo number_format($baris->harga_barang, 0,",","."); ?></td>
                  <td><?php echo number_format($baris->jumlah_barang, 0,",","."); ?></td>
                  <td><?php echo $baris->deskripsi; ?></td>
                  <td><?php echo $baris->dilihat; ?></td>
                  <td>
                    <a href="admin/barang_edit/<?php echo $baris->id_barang; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="admin/barang_hapus/<?php echo $baris->id_barang; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
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
