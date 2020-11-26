<?php
$ceks = $this->session->userdata('username@pertanian'); ?>
<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3">

      </div>
      <div class="panel panel-flat col-md-6">
        <?php
        echo $this->session->flashdata('msg');
        ?>
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Laporan Pemesanan</legend>
              <form class="form-horizontal" action="admin/cetak_pemesanan" method="post" target="_blank">
                <b>
                Tanggal
                <input type="date" name="tgl1" value="" required>
                s/d
                <input type="date" name="tgl2" value="" required>
                </b>
            </fieldset>
            <div class="col-md-12">
              <button type="submit" name="btncetak" class="btn btn-primary" style="float:right;">Cetak</button>
            </div>
          </form>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
