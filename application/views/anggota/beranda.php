<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-lg-12">

        <div class="alert alert-info alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times; &nbsp;</span>
           </button>
           <strong>Selamat datang,</strong> <?php echo ucwords($v_anggota->row()->nama_anggota); ?>
        </div>

        <div style="margin-top:-40px;">
          <?php
            $this->load->view('web/slide');
           ?>
        </div>

      </div>


    </div>
    <!-- /dashboard content -->
