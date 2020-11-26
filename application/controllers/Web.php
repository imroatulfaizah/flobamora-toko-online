<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index($offset = NULL)
	{

		$data['v_slide']   		= $this->Mcrud->get_slide();
		$data['v_kategori']   = $this->Mcrud->get_data('tbl_kategori');
		$data['v_pemesanan']  = $this->Mcrud->get_data('tbl_pemesanan');
		$data['v_populer']		= $this->Mcrud->get_barang_by_populer_limit(4);

/*
		if (isset($_POST['btncari'])) {
			$cari = $_POST['cari'];
			$data['v_barang']   	= $this->db->query("SELECT * FROM tbl_barang INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori WHERE tbl_barang.nama_barang like '%$cari%' or tbl_kategori.nama_kategori like '%$cari%' ORDER BY tbl_barang.id_barang Limit 9");
		}else{
			$data['v_barang']   	= $this->Mcrud->get_data_join_order_limit('tbl_barang', 'tbl_kategori', 'id_kategori', 'id_barang', 'DESC', '9');
		}
*/
		$jml = $this->db->get('tbl_barang');

			 $config['base_url'] = base_url().'page';

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = 9; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 2; /*data selanjutnya di parse diurisegmen 2*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['offset'] = $offset;

			  if (isset($_POST['btncari'])) {
		 			$cari = $_POST['cari'];
		 			$data['v_barang']   	= $this->Mcrud->view_barang_cari($config['per_page'], $offset, $cari);
		 		}else{
		 			$data['v_barang']   	= $this->Mcrud->view_barang($config['per_page'], $offset);
				}

					if ($data['v_barang']->num_rows() > 0 AND $data['v_barang']->num_rows() < 9) {
						 if ($offset == 0) {
							 $data['halaman'] = "";
						 }else{
							 $data['halaman'] = $this->pagination->create_links();
						 }
							//return $query;
					}else{
						 $data['halaman'] = $this->pagination->create_links();
					}


				/*membuat variable halaman untuk dipanggil di view nantinya*/

				$this->load->view('web/header', $data);
		 		$this->load->view('web/beranda', $data);
		 		$this->load->view('web/footer');
	}


	function error_not_found(){
		$this->load->view('404_content');
	}

	public function daftar()
	{

			$data['v_kategori']   = $this->Mcrud->get_data('tbl_kategori');
			$data['v_populer']		= $this->Mcrud->get_barang_by_populer_limit(4);

					$this->load->view('web/header', $data);
					$this->load->view('web/daftar', $data);
					$this->load->view('web/footer');

					if (isset($_POST['btnsimpan'])) {
								$username 		= htmlentities(strip_tags($_POST['username']));
								$password 		= htmlentities(strip_tags($_POST['password']));
								$password2 		= htmlentities(strip_tags($_POST['password2']));
								$nama_anggota = htmlentities(strip_tags($_POST['nama_anggota']));
								$alamat 		  = htmlentities(strip_tags($_POST['alamat']));
								$telp 			  = htmlentities(strip_tags($_POST['telp']));
								$email				= htmlentities(strip_tags($_POST['email']));

								date_default_timezone_set('Asia/Jakarta');
								$tgl_daftar = date('Y-m-d H:i:s');

								$cek_un = $this->Mcrud->get_data_by_pk('tbl_anggota', 'username', $username);

								if ($password != $password2) {
										$this->session->set_flashdata('msg',
											 '
											 <div class="alert alert-warning alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times; &nbsp;</span>
													</button>
													<strong>Gagal!</strong> Password tidak cocok.
											 </div>'
										 );
								}else{

										if ($cek_un->num_rows() == 0) {
												$data = array(
													'username'			=> $username,
													'password'			=> md5($password),
													'nama_anggota'  => $nama_anggota,
													'alamat'				=> $alamat,
													'telp'					=> $telp,
													'email'					=> $email,
													'tgl_daftar'	  => $tgl_daftar
													);
												$this->Mcrud->save_data('tbl_anggota', $data);

												$this->session->set_flashdata('msg',
													 '
													 <div class="alert alert-success alert-dismissible" role="alert">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Sukses!</strong> Anggota berhasil didaftar.
													 </div>'
												 );
										}else{
												$this->session->set_flashdata('msg',
													 '
													 <div class="alert alert-warning alert-dismissible" role="alert">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Gagal!</strong> Username '.$username.' sudah ada.
													 </div>'
												 );
										}
								}

							redirect('daftar');
					}

	}


	public function login()
	{
		$ceks = $this->session->userdata('user@pertanian');
		if(isset($ceks)) {
			redirect('');
		}else{

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));

						 $query  = $this->Mcrud->get_data_by_pk('tbl_anggota', 'username', $username);
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('');
										 } else {

																$this->session->set_userdata('user@pertanian', "$cekun");

																$this->session->set_flashdata('msg',
							 									 '
							 									 <div class="alert alert-success alert-dismissible" role="alert">
							 									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 												<span aria-hidden="true">&times; &nbsp;</span>
							 											</button>
							 											<strong>Login Sukses!</strong> Selamat beraktivitas '.ucwords($row->nama_anggota).'.
							 									 </div>'
							 								 );
																redirect('');
										 }
						 }
				}else{
					redirect('');
				}
		}
	}


	public function logout() {
     if ($this->session->has_userdata('user@pertanian')) {
         $this->session->sess_destroy();
         redirect('');
     }

     redirect('');
  }

	public function kat($id='',$offset=0)
	{
			if ($id == "") {
				redirect('');
			}

			$data['v_kategori']   = $this->Mcrud->get_data('tbl_kategori');
			$data['v_populer']		= $this->Mcrud->get_barang_by_populer_limit(4);

			//$data['v_barang']   	= $this->db->query("SELECT * FROM tbl_barang INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori = '$id' ORDER BY tbl_barang.id_barang Limit 9");

			$jml = $this->db->query("SELECT * FROM tbl_barang INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori = '$id'");

				 $config['base_url'] = base_url().'kat/'.$id.'';

				 $config['total_rows'] = $jml->num_rows();
				 $config['per_page'] = 9; /*Jumlah data yang dipanggil perhalaman*/
				 $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

				 /*Class bootstrap pagination yang digunakan*/
				 $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
				 $config['full_tag_close'] ="</ul>";
				 $config['num_tag_open'] = '<li>';
				 $config['num_tag_close'] = '</li>';
				 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
				 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				 $config['next_tag_open'] = "<li>";
				 $config['next_tagl_close'] = "</li>";
				 $config['prev_tag_open'] = "<li>";
				 $config['prev_tagl_close'] = "</li>";
				 $config['first_tag_open'] = "<li>";
				 $config['first_tagl_close'] = "</li>";
				 $config['last_tag_open'] = "<li>";
				 $config['last_tagl_close'] = "</li>";

				 $this->pagination->initialize($config);

				 $data['offset'] = $offset;

				 $data['v_barang']   	= $this->Mcrud->view_barang_cari_kat($config['per_page'], $offset, $id);

					 if ($data['v_barang']->num_rows() > 0 AND $data['v_barang']->num_rows() < 9) {
						 	if ($offset == 0) {
							 	$data['halaman'] = "";
							}else{
								$data['halaman'] = $this->pagination->create_links();
							}
							 //return $query;
					 }else{
						 	$data['halaman'] = $this->pagination->create_links();
					 }

			$this->load->view('web/header', $data);
			$this->load->view('web/beranda', $data);
			$this->load->view('web/footer');
  }

	public function detail($id='')
	{
			if ($id == "") {
				redirect('');
			}

			$cek_data = $this->Mcrud->get_data_by_pk('tbl_barang', 'id_barang', $id)->row();
			$dilihat = $cek_data->dilihat + 1;
			$data = array(
				'dilihat'	=> $dilihat
			);
			$this->Mcrud->update_data('tbl_barang', array('id_barang' => $id), $data);

			$data['v_kategori']   = $this->Mcrud->get_data('tbl_kategori');
			$data['v_populer']		= $this->Mcrud->get_barang_by_populer_limit(6);

			$data['v_barang']   	= $this->db->query("SELECT * FROM tbl_barang INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori WHERE tbl_barang.id_barang = '$id' ORDER BY tbl_barang.id_barang Limit 9");

			$this->load->view('web/header', $data);
			$this->load->view('web/detail', $data);
			$this->load->view('web/footer');

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d');

				if (isset($_POST['btnbeli'])) {
						$ceks 		 = $this->session->userdata('user@pertanian');
						$id_barang = htmlentities(strip_tags($_POST['id_barang']));
						$cek_barang = $this->Mcrud->get_data_by_pk('tbl_barang', 'id_barang', $id_barang)->row();

						$cek_data = $this->db->query("SELECT * FROM tbl_keranjang WHERE username='$ceks' and id_barang='$id_barang'");

						if ($cek_barang->jumlah_barang <= 0) {
								$this->session->set_flashdata('msg',
								 '
								 <div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times; &nbsp;</span>
										</button>
										<strong>Maaf!</strong> Stok Barang '.$cek_barang->nama_barang.' habis.
								 </div>'
							 );
						}else{
								if ($cek_data->num_rows() == 0) {
										$data = array(
											'username'			 => $ceks,
											'id_barang' 		 => $id,
											'jumlah_dipesan' => 1,
											'tgl_keranjang'  => $tgl,
											'kd_pemesanan'	 => ''
										);
										$this->Mcrud->save_data('tbl_keranjang', $data);
								}else{
										$tambah = $cek_data->row()->jumlah_dipesan + 1;
										$data = array(
											'jumlah_dipesan'	=> $tambah
										);
										$this->Mcrud->update_data('tbl_keranjang', array('username' => $ceks,'id_barang' => $id_barang), $data);
								}

								$kurang = $cek_barang->jumlah_barang - 1;
								$data2 = array(
									'jumlah_barang'	=> $kurang
								);
								$this->Mcrud->update_data('tbl_barang', array('id_barang' => $id_barang), $data2);

								$this->session->set_flashdata('msg',
								 '
								 <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times; &nbsp;</span>
										</button>
										<strong>Sukses!</strong> berhasil ditambahkan ke keranjang.
								 </div>'
							 );
						}
						redirect("detail/$id");
				}
  }


	public function keranjang()
	{
		$ceks = $this->session->userdata('user@pertanian');
		if(!isset($ceks)) {
			redirect('');
		}

			$data['v_kategori']   = $this->Mcrud->get_data('tbl_kategori');
			$data['v_populer']		= $this->Mcrud->get_barang_by_populer_limit(6);

			$data['v_barang']   	= $this->db->query("SELECT * FROM tbl_keranjang
																								INNER JOIN tbl_anggota ON tbl_anggota.username=tbl_keranjang.username
																								INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang
																								INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
																								WHERE tbl_keranjang.username = '$ceks' AND tbl_keranjang.kd_pemesanan = '' ORDER BY tbl_keranjang.tgl_keranjang");

			$data['v_sum_barang']   	= $this->db->query("SELECT SUM(tbl_keranjang.jumlah_dipesan) as total_pesan,
																								SUM(tbl_barang.harga_barang) as total_harga_barang,
																								SUM(tbl_keranjang.jumlah_dipesan * tbl_barang.harga_barang) as total_harga
			 																					FROM tbl_keranjang
																								INNER JOIN tbl_anggota ON tbl_anggota.username=tbl_keranjang.username
																								INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang
																								INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
																								WHERE tbl_keranjang.username = '$ceks' AND tbl_keranjang.kd_pemesanan = ''")->row();

			$this->load->view('web/header', $data);
			$this->load->view('web/keranjang', $data);
			$this->load->view('web/footer');

			$ceks 		 = $this->session->userdata('user@pertanian');
			$max_barang = $data['v_barang']->num_rows();

			for ($i=1; $i <= $max_barang ; $i++) {
					if (isset($_POST['kurang_'.$i.''])) {

								$id_keranjang = htmlentities(strip_tags($_POST['id_keranjang_'.$i.'']));
								$id_barang 	  = htmlentities(strip_tags($_POST['id_barang_'.$i.'']));
								$cek_barang = $this->Mcrud->get_data_by_pk('tbl_barang', 'id_barang', $id_barang)->row();
								$cek_data = $this->db->query("SELECT * FROM tbl_keranjang WHERE id_keranjang='$id_keranjang'");

									$kurang = $cek_data->row()->jumlah_dipesan - 1;
									$data = array(
										'jumlah_dipesan'	=> $kurang
									);
									$this->Mcrud->update_data('tbl_keranjang', array('id_keranjang' => $id_keranjang), $data);

									$tambah = $cek_barang->jumlah_barang + 1;
									$data2 = array(
										'jumlah_barang'	=> $tambah
									);
									$this->Mcrud->update_data('tbl_barang', array('id_barang' => $id_barang), $data2);

									redirect("keranjang");
					}


					if (isset($_POST['tambah_'.$i.''])) {
								$id_keranjang = htmlentities(strip_tags($_POST['id_keranjang_'.$i.'']));
								$id_barang 	  = htmlentities(strip_tags($_POST['id_barang_'.$i.'']));
								$cek_barang = $this->Mcrud->get_data_by_pk('tbl_barang', 'id_barang', $id_barang)->row();
								$cek_data = $this->db->query("SELECT * FROM tbl_keranjang WHERE id_keranjang='$id_keranjang'");

									$tambah = $cek_data->row()->jumlah_dipesan + 1;
									$data = array(
										'jumlah_dipesan'	=> $tambah
									);
									$this->Mcrud->update_data('tbl_keranjang', array('id_keranjang' => $id_keranjang), $data);

									$kurang = $cek_barang->jumlah_barang - 1;
									$data2 = array(
										'jumlah_barang'	=> $kurang
									);
									$this->Mcrud->update_data('tbl_barang', array('id_barang' => $id_barang), $data2);

									redirect("keranjang");
					}


					if (isset($_POST['hapus_'.$i.''])) {

								$id_keranjang = htmlentities(strip_tags($_POST['id_keranjang_'.$i.'']));
								$id_barang 	  = htmlentities(strip_tags($_POST['id_barang_'.$i.'']));
								$cek_barang = $this->Mcrud->get_data_by_pk('tbl_barang', 'id_barang', $id_barang)->row();

								$tambah = $cek_barang->jumlah_barang + 1;
								$data2 = array(
									'jumlah_barang'	=> $tambah
								);
								$this->Mcrud->update_data('tbl_barang', array('id_barang' => $id_barang), $data2);

								$this->Mcrud->delete_data_by_pk('tbl_keranjang', 'id_keranjang', $id_keranjang);
								redirect("keranjang");
					}
			}

  }


	public function proses_beli()
	{
		$ceks = $this->session->userdata('user@pertanian');
		if(!isset($ceks)) {
			redirect('');
		}

		if (isset($_POST['btnbeli'])) {

			$data['v_biodata']    = $this->Mcrud->get_data_by_pk('tbl_anggota', 'username', $ceks)->row();
			$data['v_kategori']   = $this->Mcrud->get_data('tbl_kategori');
			$data['v_populer']		= $this->Mcrud->get_barang_by_populer_limit(6);

			$data['v_barang']   	= $this->db->query("SELECT * FROM tbl_keranjang
																								INNER JOIN tbl_anggota ON tbl_anggota.username=tbl_keranjang.username
																								INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang
																								INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
																								WHERE tbl_keranjang.username = '$ceks' AND tbl_keranjang.kd_pemesanan = '' ORDER BY tbl_keranjang.tgl_keranjang");

			$data['v_sum_barang']   	= $this->db->query("SELECT SUM(tbl_keranjang.jumlah_dipesan) as total_pesan,
																								SUM(tbl_barang.harga_barang) as total_harga_barang,
																								SUM(tbl_keranjang.jumlah_dipesan * tbl_barang.harga_barang) as total_harga
			 																					FROM tbl_keranjang
																								INNER JOIN tbl_anggota ON tbl_anggota.username=tbl_keranjang.username
																								INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang
																								INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
																								WHERE tbl_keranjang.username = '$ceks' AND tbl_keranjang.kd_pemesanan = ''")->row();

			$this->load->view('web/header', $data);
			$this->load->view('web/proses_beli', $data);
			$this->load->view('web/footer');

		}


		if (isset($_POST['btnkirim'])) {
				$kd_pemesanan	 		= htmlentities(strip_tags($_POST['kd_pemesanan']));
				$alamat	 					= htmlentities(strip_tags($_POST['alamat']));
				$jumlah_dipesan	 	= htmlentities(strip_tags($_POST['jumlah_dipesan']));
				$harga_barang	 		= htmlentities(strip_tags($_POST['harga_barang']));
				$jumlah_harga	 		= htmlentities(strip_tags($_POST['jumlah_harga']));
				$ongkir	 					= htmlentities(strip_tags($_POST['ongkir']));
				$total	 					= htmlentities(strip_tags($_POST['total']));

				date_default_timezone_set('Asia/Jakarta');
				$tgl = date('Y-m-d H:i:s');

				//$un	= strtoupper($ceks);
				//$kd_pemesanan = date('Ymdhis')."$un";

				$file_size = 5500; //5 MB
				$this->upload->initialize(array(
					"upload_path"   => "./img/bukti/",
					"allowed_types" => "jpg|jpeg|png|gif",
					"max_size" => "$file_size"
				));


				if ( ! $this->upload->do_upload('foto'))
				{
						$error = $this->upload->display_errors('<p>', '</p>');
						$update = "";
				}
				 else
				{
							$gbr = $this->upload->data();
							$filename = $gbr['file_name'];
							$filename = "img/bukti/".$filename;
							$foto 		= preg_replace('/ /', '_', $filename);

							$update = "yes";
				}

				if ($update = "yes") {
						$data = array(
							'kd_pemesanan'			=> $kd_pemesanan
						);
						$this->Mcrud->update_data('tbl_keranjang', array('username' => $ceks, 'kd_pemesanan' => ''), $data);

						$data = array(
							'username'				=> $ceks,
							'alamat'					=> $alamat,
							'kd_pemesanan'		=> $kd_pemesanan,
							'jumlah_dipesan'	=> $jumlah_dipesan,
							'harga_barang'		=> $harga_barang,
							'jumlah_harga'		=> $jumlah_harga,
							'ongkir'					=> $ongkir,
							'total'						=> $total,
							'tgl_pemesanan'		=> $tgl,
							'foto'						=> $foto,
							'konfirmasi'			=> 'belum',
							'status'					=> ''
						);
						$this->Mcrud->save_data('tbl_pemesanan', $data);

						$this->session->set_flashdata('msg',
							 '
							 <div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> Mohon tunggu Konfirmasi dari admin.
							 </div>'
						 );
				}else{
						$this->session->set_flashdata('msg',
							 '
							 <div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times; &nbsp;</span>
									</button>
									<strong>Gagal!</strong> '.$error.'.
							 </div>'
						 );
				}
				redirect('web/pemesanan');

		}

	}


	public function user()
	{
		$ceks = $this->session->userdata('user@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
					$data['v_slide']   		= $this->Mcrud->get_slide();
					$data['v_anggota'] 		= $this->Mcrud->get_data_by_pk('tbl_anggota','username',$ceks);

					$this->load->view('anggota/header', $data);
					$this->load->view('anggota/beranda', $data);
					$this->load->view('anggota/footer');
		}
	}


	public function profile()
	{
		$ceks = $this->session->userdata('user@pertanian');
		if(!isset($ceks)) {
			redirect('');
		}else{
				$data['v_anggota']   = $this->Mcrud->get_data_by_pk('tbl_anggota','username',$ceks);

					$this->load->view('anggota/header', $data);
					$this->load->view('anggota/profile', $data);
					$this->load->view('anggota/footer');

					if (isset($_POST['btnupdate'])) {
						$username 	= htmlentities(strip_tags($this->input->post('username')));
						$password 	= htmlentities(strip_tags($this->input->post('password')));
						$anggota 		= htmlentities(strip_tags($this->input->post('anggota')));
						$alamat 		= htmlentities(strip_tags($this->input->post('alamat')));
						$telp 			= htmlentities(strip_tags($this->input->post('telp')));
						$email 			= htmlentities(strip_tags($this->input->post('email')));

						$cek_data = $this->Mcrud->get_data_by_pk('tbl_anggota', 'username', $username);
						if ($cek_data->num_rows() == 0) {
								$status = "update";
						}else{
								if ($username == $ceks) {
										$status = "update";
								}else{
										$status = "";
								}
						}

						if ($status == "update") {
								$data = array(
									'username'			=> $username,
									'password'			=> md5($password),
									'nama_anggota'	=> $anggota,
									'alamat'				=> $alamat,
									'telp'					=> $telp,
									'email'					=> $email
								);
								$this->Mcrud->update_data('tbl_anggota', array('username' => $ceks), $data);

								$data2 = array(
									'username'			=> $username
								);
								$this->Mcrud->update_data('tbl_keranjang', array('username' => $ceks), $data2);
								$this->Mcrud->update_data('tbl_pemesanan', array('username' => $ceks), $data2);

								$this->session->has_userdata('user@pertanian');
								$this->session->set_userdata('user@pertanian', "$username");
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
								);
						}else{
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Username '.$username.' sudah ada.
									</div>'
								);
						}

						redirect('web/profile');
					}

		}
	}



	public function pemesanan()
	{
		$ceks = $this->session->userdata('user@pertanian');
		if(!isset($ceks)) {
			redirect('web');
		}else{
			$data['v_anggota']		 = $this->Mcrud->get_data_by_pk('tbl_anggota', 'username', $ceks);
			$data['v_pemesanan'] = $this->db->query("SELECT * FROM tbl_pemesanan ORDER BY id_pemesanan DESC");

					$this->load->view('anggota/header', $data);
					$this->load->view('anggota/pemesanan/pemesanan', $data);
					$this->load->view('anggota/footer');

		}
	}

	public function pemesanan_detail($id='')
	{
		$ceks = $this->session->userdata('user@pertanian');
		if(!isset($ceks)) {
			redirect('web');
		}else{

			$data['v_anggota']	 = $this->Mcrud->get_data_by_pk('tbl_anggota', 'username', $ceks);
			$data['v_pemesanan'] = $this->Mcrud->get_data_by_pk('tbl_pemesanan', 'kd_pemesanan', $id)->row();

			$data_un = $data['v_pemesanan']->username;

			$data['v_biodata']    = $this->Mcrud->get_data_by_pk('tbl_anggota', 'username', $data_un)->row();

			$data['v_barang']   	= $this->db->query("SELECT * FROM tbl_keranjang
																								INNER JOIN tbl_anggota ON tbl_anggota.username=tbl_keranjang.username
																								INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang
																								INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
																								WHERE tbl_keranjang.username = '$data_un' AND tbl_keranjang.kd_pemesanan = '$id' ORDER BY tbl_keranjang.tgl_keranjang");

			$data['v_sum_barang']   	= $this->db->query("SELECT SUM(tbl_keranjang.jumlah_dipesan) as total_pesan,
																								SUM(tbl_barang.harga_barang) as total_harga_barang,
																								SUM(tbl_keranjang.jumlah_dipesan * tbl_barang.harga_barang) as total_harga
			 																					FROM tbl_keranjang
																								INNER JOIN tbl_anggota ON tbl_anggota.username=tbl_keranjang.username
																								INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang
																								INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
																								WHERE tbl_keranjang.username = '$data_un' AND tbl_keranjang.kd_pemesanan = '$id'")->row();

					$this->load->view('anggota/header', $data);
					$this->load->view('anggota/pemesanan/pemesanan_detail', $data);
					$this->load->view('anggota/footer');
		}
	}

}
