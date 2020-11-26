<?php
$ceks = $this->session->userdata('user@pertanian');
$v_anggota = $v_anggota->row()?>
<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="panel panel-flat col-md-6">
        <?php
        echo $this->session->flashdata('msg');
        ?>
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Profile - Biodata</legend>
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <label class="control-label col-lg-3">Nama Anggota</label>
                  <div class="col-lg-9">
                    <input type="text" name="anggota" class="form-control" value="<?php echo $v_anggota->nama_anggota; ?>" placeholder="Nama Anggota" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Alamat</label>
                  <div class="col-lg-9">
                    <textarea name="alamat" rows="2" cols="80" class="form-control" placeholder="Alamat" required><?php echo $v_anggota->alamat; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Telp</label>
                  <div class="col-lg-9">
                    <input type="text" name="telp" class="form-control" value="<?php echo $v_anggota->telp; ?>" placeholder="Telp" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Email</label>
                  <div class="col-lg-9">
                    <input type="email" name="email" class="form-control" value="<?php echo $v_anggota->email; ?>" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Username</label>
                  <div class="col-lg-9">
                    <input type="text" name="username" class="form-control" value="<?php echo $ceks; ?>" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Password</label>
                  <div class="col-lg-9">
                    <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
                  </div>
                </div>

            </fieldset>
            <div class="col-md-12">
              <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
            </div>
          </form>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
