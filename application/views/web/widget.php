
		<div class="panel panel-default">
		  <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> <b>Kategori</b></div>
		  <div class="panel-body">

				<ul class="nav">
				<?php
				foreach ($v_kategori->result() as $row)
				{
					$id	  = $row->id_kategori;
					$nama = $row->nama_kategori;

					$total_kategori = $this->db->query('SELECT * FROM tbl_barang INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori='.$id.'')->num_rows();
					echo '
					<li>
						<a href="kat/'.$id.'">
							<span class="glyphicon glyphicon-modal-window"></span> '.ucwords($nama).' <span class="badge">'.$total_kategori.'</span>
						</a>
					</li>';
				}
				?>
				</ul>

		  </div>
		</div>
    
<?php
$link_1 = strtolower($this->uri->segment(1));
if ($link_1 != "detail" and $link_1 != "keranjang" and $link_1 != "proses_beli") {  ?>
		<div class="panel panel-default">
		  <div class="panel-heading"><span class="glyphicon glyphicon-equalizer"></span> <b>Populer</b></div>
		  <div class="panel-body">
				<?php
			  foreach ($v_populer->result() as $baris)
			  { ?>
					<div class="row">
					  <div class="col-md-4">
					  <a href="detail/<?php echo $baris->id_barang; ?>">
						<div class="thumbnail">
						  <img src="<?php echo $baris->foto; ?>" alt="..." class="img-responsive">
						</div>
					  </div>
					  <?php echo ucwords(substr($baris->nama_barang, 0, 30)); if (strlen($baris->nama_barang) >= 30){ echo "...";}?>
						<br>
							Rp. <?php echo number_format($baris->harga_barang,0,",",".");?>

						</a>
					</div>
				<?php
			  }
			  ?>
		  </div>
		</div>
<?php
} ?>
