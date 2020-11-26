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
          <h5 class="panel-title">Edit Barang</h5>
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
                    <input type="text" name="nama_barang" class="form-control" value="<?php echo $v_barang->nama_barang; ?>" required maxlength="30">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kategori</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kategori" required>
                      <option value="">-- Pilih Kategori --</option>
                      <?php
                      foreach ($v_kategori->result() as $baris) { ?>
                        <option value="<?php echo $baris->id_kategori; ?>" <?php if ($baris->id_kategori == $v_barang->id_kategori){ echo "selected";} ?>><?php echo $baris->nama_kategori; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Harga Barang</label>
                  <div class="col-lg-10">
                    <input type="number" name="harga_barang" class="form-control" value="<?php echo $v_barang->harga_barang; ?>" required maxlength="11">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jumlah Barang</label>
                  <div class="col-lg-10">
                    <input type="number" name="jumlah_barang" class="form-control" value="<?php echo $v_barang->jumlah_barang; ?>" required maxlength="4">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Deskripsi</label>
                  <div class="col-lg-10">
                    <textarea name="deskripsi" rows="3" cols="80" class="form-control" required><?php echo $v_barang->deskripsi; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Foto Barang</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto" class="form-control" value="">
                    <i>*boleh dikosongkan jika tidak diubah</i>
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

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
