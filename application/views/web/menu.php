<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand active" href=""> <b>Flobamora Computer</b> </a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!--
	  <ul class="nav navbar-nav">
  		<li><a href=""><span class="glyphicon glyphicon-question-sign"></span> </a></li>
  		<li><a href=""><span class="glyphicon glyphicon-modal-window"></span> </a></li>
  		<li><a href=""><span class="glyphicon glyphicon-modal-window"></span> </a></li>
	  </ul>-->
	  <form method="post" action="<?php echo base_url(); ?>" class="navbar-form navbar-left" role="search">
		<div class="form-group">
		  <input type="search" class="form-control" name="cari" placeholder="Cari Barang, Kategori . . ." style="width:500px">
		</div>
			<button type="submit" name="btncari" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Cari</button>
	  </form>
	  <ul class="nav navbar-nav navbar-right">
      <?php
      $ceks = $this->session->userdata('user@pertanian');
      $isi_keranjang  	= $this->db->query("SELECT * FROM tbl_keranjang
																								INNER JOIN tbl_anggota ON tbl_anggota.username=tbl_keranjang.username
																								INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang
																								INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
																								WHERE tbl_keranjang.username = '$ceks' AND tbl_keranjang.kd_pemesanan = ''")->num_rows();
  		if(isset($ceks)) {?>
        <li><a href="keranjang"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="label label-danger"> <?php echo $isi_keranjang; ?> </span></a></li>
        <li><a href="web/user"><span class="glyphicon glyphicon-user"></span> <?php echo $ceks; ?> </a></li>
        <li><a href="web/logout" onclick="return confirm('Anda Yakin?')"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      <?php
      }else{ ?>
        <li><a href="#log" data-toggle="modal" data-target="#log"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="label label-danger"> 0 </span></a></li>
        <li><a href="#log" data-toggle="modal" data-target="#log"><span class="glyphicon glyphicon-log-in"></span> Login | Daftar</a></li>
      <?php
      }
      ?>

    <!--
    <li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-question-sign"></span> About Me <span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="#profile" data-toggle="modal" data-target="#profile">Profile</a></li>
			<li><a href="#kontak" data-toggle="modal" data-target="#kontak">Kontak</a></li>
			<li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
			<li class="divider"></li>
			<?php
			$ceks = $this->session->userdata('user@pertanian');
			if(!isset($ceks)) {
				echo'<li><a href="admin/login_berita"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
			}else{
				echo'
				<li><a href="admin"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
				<li><a href="admin/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
			}
			?>
		  </ul>
		</li>-->
	  </ul>
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
