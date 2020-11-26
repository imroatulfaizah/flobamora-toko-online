  <?php
$cek    = $v_admin->row();
$nama   = $cek->username;

$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack adminsite Copier/3.x [XR&CO'2014], Tue, 25 Apr 2017 11:59:08 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="<?php echo base_url();?>"/>

	<title><?php echo ucwords($nama); ?> | TOKO FLOBAMORA COMPUTER</title>

	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<?php
	if ($sub_menu == "" or $sub_menu == "profile" or $sub_menu == "lap_pemesanan") {?>
	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!--
	<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
	-->
	<!-- /theme JS files -->
	<?php
	} ?>

	<?php
	if ($sub_menu == "anggota" or $sub_menu == "kategori" or $sub_menu == "kategori_edit" or
			$sub_menu == "barang" or $sub_menu == "barang_edit" or $sub_menu == "slide" or $sub_menu == "slide_edit" or
			$sub_menu == "pemesanan" or $sub_menu == "pemesanan_detail") {?>
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

		<script type="text/javascript" src="assets/js/core/app.js"></script>
		<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
		<!-- /theme JS files -->
	<?php
	} ?>

</head>
<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default navbar-fixed-top header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="" target="_blank"><i class="icon-eye"></i> Web View</a></li>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="img/Rita.jpg" alt="">
						<span><?php echo ucwords($nama); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="admin/profile"><i class="icon-user"></i> Profile</a></li>
						<li class="divider"></li>
						<li><a href="admin/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="admin/profile" class="media-left"><img src="img/Rita.jpg " class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo ucwords($nama); ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp; Admin
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if ($sub_menu == "") { echo 'active';}?>"><a href="admin"><i class="icon-home4"></i> <span>Beranda</span></a></li>

								<li class="<?php if ($sub_menu == "anggota" or $sub_menu == "anggota_edit" or $sub_menu == "kategori" or $sub_menu == "kategori_edit" or $sub_menu == "barang" or $sub_menu == "barang_edit") { echo 'active';}?>">
									<a href="#"><i class="icon-stack2"></i> <span>Master</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "slide" or $sub_menu == "slide_edit") { echo 'active';}?>"><a href="admin/slide">Slide</a></li>
										<li class="<?php if ($sub_menu == "anggota") { echo 'active';}?>"><a href="admin/anggota">Data Anggota</a></li>
										<li class="<?php if ($sub_menu == "kategori" or $sub_menu == "kategori_edit") { echo 'active';}?>"><a href="admin/kategori">+ Kategori </a></li>
										<li class="<?php if ($sub_menu == "barang" or $sub_menu == "barang_edit") { echo 'active';}?>"><a href="admin/barang">+ Barang</a></li>
									</ul>
								</li>

								<li class="<?php if ($sub_menu == "pemesanan" or $sub_menu == "pemesanan_detail") { echo 'active';}?>"><a href="admin/pemesanan"><i class="glyphicon glyphicon-shopping-cart"></i> Pemesanan</a></li>

								<li class="<?php if ($sub_menu == "lap_anggota" or $sub_menu == "lap_pemesanan") { echo 'active';}?>">
									<a href="#"><i class="icon-printer4"></i> <span>Laporan</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "lap_anggota") { echo 'active';}?>"><a href="admin/lap_anggota" target="_blank">Anggota</a></li>
										<li class="<?php if ($sub_menu == "lap_barang") { echo 'active';}?>"><a href="admin/lap_barang" target="_blank">Barang</a></li>
										<li class="<?php if ($sub_menu == "lap_pemesanan") { echo 'active';}?>"><a href="admin/lap_pemesanan">Pemesanan</a></li>
									</ul>
								</li>

								<!-- /main -->

								<!-- Logout -->
								<li class="navigation-header"><span>Logout</span> <i class="icon-menu" title=""></i></li>
								<li><a href="admin/logout"><i class="icon-switch2"></i> <span>Logout </span></a></li>

								<!-- /logout -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
