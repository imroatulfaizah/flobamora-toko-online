<html>
<head>
	<title>Flobamora Computer</title>
	<base href="<?php echo base_url() ?>"/>
	<link rel="icon" type="image/png" href="img/logo.png">
	<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css"/>
</head>
<body style="background-color:">
<?php

	$link_1 = strtolower($this->uri->segment(1));
	$this->load->view('web/menu');

if (!isset($_POST['btncari'])) {
	if ($link_1 == "" or $link_1 == "web") {
		$this->load->view('web/slide');
	}else {
		echo "<br><br>";
	}
}else {
	echo "<br><br>";
}

?>
<br/>
<div class="container">

<?php
if ($link_1 != "detail" and $link_1 != "keranjang" and $link_1 != "proses_beli") { ?>
	<div class="col-md-3">
		<?php $this->load->view('web/widget');?>
	</div>
<?php
}?>
