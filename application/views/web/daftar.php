<div class="col-md-9">
  <div class="panel panel-default">
    <!--<div class="panel-heading">
     <span class="glyphicon glyphicon-home"></span>
     Beranda
   </div>-->
    <div class="panel-body">

        <div class="col-md-12">
          <div class="panel panel-default">

            <div class="panel-heading">
              <b>Form Pendaftaran Anggota</b>
            </div>
            <div class="panel-body">
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" role="form" action="" method="post">
                <div class="form-group">
                  <label for="inputNama_Anggota" class="col-sm-2 control-label">Nama Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_anggota" id="inputNama_Anggota" placeholder="Nama Anggota" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp" class="col-sm-2 control-label">Telp</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="telp" id="inputTelp" placeholder="Telp" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" required>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputRePassword3" class="col-sm-2 control-label">Re-Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password2" id="inputRePassword3" placeholder="Re-Password" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btnsimpan" class="btn btn-default" style="float:right;">Daftar Sekarang</button>
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>

    </div>

  </div>
</div>
