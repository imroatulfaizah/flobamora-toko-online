<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
					$data['v_admin']   = $this->Mcrud->get_data('tbl_admin');
					$data['v_anggota'] = $this->Mcrud->get_data('tbl_anggota');
					$data['v_barang']  = $this->Mcrud->get_data('tbl_barang');
					$data['v_pemesanan']  = $this->Mcrud->get_data('tbl_pemesanan');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/beranda', $data);
					$this->load->view('admin/footer');
		}
	}


	public function login()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(isset($ceks)) {
			redirect('');
		}else{
			$this->load->view('admin/login/header');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));

						 $query  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $username);
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
								 redirect('admin/login');
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
												redirect('admin/login');
										 } else {

																$this->session->set_userdata('username@pertanian', "$cekun");

																redirect('admin');
										 }
						 }
				}
		}
	}


	public function logout() {
     if ($this->session->has_userdata('username@pertanian')) {
         $this->session->sess_destroy();
         redirect('');
     }
     redirect('');
  }


	public function lupa_password()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$this->load->view('admin/login/header');
			$this->load->view('admin/login/lupa_password');
			$this->load->view('admin/login/footer');
		}
	}


	public function profile()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
				$data['v_admin']   = $this->Mcrud->get_data('tbl_admin');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/profile', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$username 	= htmlentities(strip_tags($this->input->post('username')));
						$password 	= htmlentities(strip_tags($this->input->post('password')));

						$cek_data = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $username);
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
									'username'	=> $username,
									'password'	=> md5($password)
								);
								$this->Mcrud->update_data('tbl_admin', array('username' => $ceks), $data);
								$this->session->has_userdata('username@pertanian');
								$this->session->set_userdata('username@pertanian', "$username");
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

						redirect('admin/profile');
					}

		}
	}


	public function slide()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']	 = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_slide']   = $this->Mcrud->get_data('tbl_slide');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/slide', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$judul 		= htmlentities(strip_tags($_POST['judul']));

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/slide/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

							$cek_foto = $data['v_slide']->foto;

					    if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
			         else
			        {
										$gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/slide/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
			        }

							if ($update = "yes") {
									$data = array(
										'judul'			=> $judul,
										'foto'			=> $foto
									);
									$this->Mcrud->save_data('tbl_slide', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Slide berhasil disimpan.
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
							redirect('admin/slide');
					}

		}
	}


	public function slide_edit($id)
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']  	= $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_slide']   = $this->Mcrud->get_data_by_pk('tbl_slide', 'id_slide', $id)->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/slide_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$judul 		= htmlentities(strip_tags($_POST['judul']));

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/slide/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

							$cek_foto = $data['v_slide']->foto;

					if ($_FILES['foto']['error'] <> 4) {
			        if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
			         else
			        {
										unlink("$cek_foto");
			              $gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/slide/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
			        }
					}else{
						$foto   = $cek_foto;
						$update = "yes";
					}

							if ($update = "yes") {
									$data = array(
										'judul'			=> $judul,
										'foto'			=> $foto
									);
									$this->Mcrud->update_data('tbl_slide', array('id_slide' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Slide berhasil diperbarui.
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
							redirect('admin/slide');
					}

		}
	}


	public function slide_hapus($id)
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
					$cek_data = $this->Mcrud->get_data_by_pk('tbl_slide', 'id_slide', $id)->row();

					unlink("$cek_data->foto");
					$this->Mcrud->delete_data_by_pk('tbl_slide', 'id_slide', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Slide berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/slide');

		}
	}


	public function anggota()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']		 = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_anggota']   = $this->Mcrud->get_data('tbl_anggota');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/anggota', $data);
					$this->load->view('admin/footer');
		}
	}

	public function anggota_hapus($id='')
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
					$this->Mcrud->delete_data_by_pk('tbl_anggota', 'username', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Anggota berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/anggota');

		}
	}


	public function kategori()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']  	  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kategori']   = $this->Mcrud->get_data('tbl_kategori');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/kategori', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kategori 		= htmlentities(strip_tags($_POST['nama_kategori']));

									$data = array(
										'nama_kategori'			=> $nama_kategori
										);
									$this->Mcrud->save_data('tbl_kategori', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Kategori berhasil ditambahkan.
										 </div>'
									 );

							redirect('admin/kategori');
					}

		}
	}


	public function kategori_edit($id='')
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']  	  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kategori']   = $this->Mcrud->get_data_by_pk('tbl_kategori', 'id_kategori', $id)->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/kategori_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kategori 		= htmlentities(strip_tags($_POST['nama_kategori']));

									$data = array(
										'nama_kategori'			=> $nama_kategori
										);
									$this->Mcrud->update_data('tbl_kategori', array('id_kategori' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Kategori berhasil diperbarui.
										 </div>'
									 );

							redirect('admin/kategori');
					}

		}
	}

	public function kategori_hapus($id='')
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
					$this->Mcrud->delete_data_by_pk('tbl_kategori', 'id_kategori', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Kategori berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/kategori');

		}
	}


	public function barang()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']  	= $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kategori'] = $this->Mcrud->get_data('tbl_kategori');
			$data['v_barang']   = $this->Mcrud->get_data_join('tbl_barang', 'tbl_kategori', 'id_kategori');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/barang', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_barang 		= htmlentities(strip_tags($_POST['nama_barang']));
							$id_kategori 		= htmlentities(strip_tags($_POST['id_kategori']));
							$harga_barang   = htmlentities(strip_tags($_POST['harga_barang']));
							$jumlah_barang  = htmlentities(strip_tags($_POST['jumlah_barang']));
							$deskripsi 			= $_POST['deskripsi'];

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/barang/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

			        if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
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
			         else
			        {
			              $gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/barang/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$data = array(
											'nama_barang'			=> $nama_barang,
											'id_kategori'			=> $id_kategori,
											'harga_barang'		=> $harga_barang,
											'jumlah_barang'	  => $jumlah_barang,
											'deskripsi'				=> $deskripsi,
											'foto'						=> $foto,
											'dilihat'					=> 0
										);
										$this->Mcrud->save_data('tbl_barang', $data);

										$this->session->set_flashdata('msg',
											 '
											 <div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times; &nbsp;</span>
													</button>
													<strong>Sukses!</strong> Barang berhasil ditambahkan.
											 </div>'
										 );
			        }

							redirect('admin/barang');
					}

		}
	}



	public function barang_edit($id)
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']  	= $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kategori'] = $this->Mcrud->get_data('tbl_kategori');
			$data['v_barang']   = $this->db->query("SELECT * FROM tbl_barang
																							INNER JOIN tbl_kategori ON tbl_kategori.id_kategori=tbl_barang.id_kategori
																							WHERE tbl_barang.id_barang='$id'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/master/barang_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_barang 		= htmlentities(strip_tags($_POST['nama_barang']));
							$id_kategori 		= htmlentities(strip_tags($_POST['id_kategori']));
							$harga_barang   = htmlentities(strip_tags($_POST['harga_barang']));
							$jumlah_barang  = htmlentities(strip_tags($_POST['jumlah_barang']));
							$deskripsi 			= htmlentities(strip_tags($_POST['deskripsi']));

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/barang/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

							$cek_foto = $data['v_barang']->foto;

					if ($_FILES['foto']['error'] <> 4) {
			        if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
			         else
			        {
										unlink("$cek_foto");
			              $gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/barang/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
			        }
					}else{
						$foto   = $cek_foto;
						$update = "yes";
					}

							if ($update = "yes") {
									$data = array(
										'nama_barang'			=> $nama_barang,
										'id_kategori'			=> $id_kategori,
										'harga_barang'		=> $harga_barang,
										'jumlah_barang'	  => $jumlah_barang,
										'deskripsi'				=> $deskripsi,
										'foto'						=> $foto
									);
									$this->Mcrud->update_data('tbl_barang', array('id_barang' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Barang berhasil diperbarui.
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
							redirect('admin/barang');
					}

		}
	}


	public function barang_hapus($id='')
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
					$cek_data = $this->Mcrud->get_data_by_pk('tbl_barang', 'id_barang', $id)->row();

					unlink("$cek_data->foto");
					$this->Mcrud->delete_data_by_pk('tbl_barang', 'id_barang', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Barang berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/barang');

		}
	}


	public function pemesanan()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['v_admin']		 = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_pemesanan'] = $this->db->query("SELECT * FROM tbl_pemesanan ORDER BY id_pemesanan DESC");

					$this->load->view('admin/header', $data);
					$this->load->view('admin/pemesanan/pemesanan', $data);
					$this->load->view('admin/footer');

					$max = $data['v_pemesanan']->num_rows();
					for ($i=1; $i <= $max; $i++) {
						if (isset($_POST['btnya_'.$i.''])) {
								$kd_pemesanan = $_POST['kd_pemesanan_'.$i.''];

								$data = array(
									'konfirmasi'	=> 'sudah'
								);
								$this->Mcrud->update_data('tbl_pemesanan', array('kd_pemesanan' => $kd_pemesanan), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Berhasil dikonfirmasi.
									 </div>'
								 );
								 redirect('admin/pemesanan');

						}


						if (isset($_POST['btnbatal_'.$i.''])) {
								$kd_pemesanan = $_POST['kd_pemesanan_'.$i.''];

								$data = array(
									'konfirmasi'	=> 'belum',
									'status'			=> ''
								);
								$this->Mcrud->update_data('tbl_pemesanan', array('kd_pemesanan' => $kd_pemesanan), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Konfirmasi dibatalkan.
									 </div>'
								 );
								 redirect('admin/pemesanan');

						}


						if (isset($_POST['btnsampai_'.$i.''])) {
								$kd_pemesanan = $_POST['kd_pemesanan_'.$i.''];

								$data = array(
									'status'			=> 'sukses'
								);
								$this->Mcrud->update_data('tbl_pemesanan', array('kd_pemesanan' => $kd_pemesanan), $data);

								$this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> :).
									 </div>'
								 );
								 redirect('admin/pemesanan');

						}


					}
		}
	}

	public function pemesanan_detail($id='')
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{

			$data['v_admin']		 = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
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

					$this->load->view('admin/header', $data);
					$this->load->view('admin/pemesanan/pemesanan_detail', $data);
					$this->load->view('admin/footer');
		}
	}

	public function pemesanan_hapus($kd_pemesanan='')
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}

			$foto = $this->Mcrud->get_data_by_pk('tbl_pemesanan', 'kd_pemesanan', $kd_pemesanan)->row()->foto;
			unlink($foto);

			$this->Mcrud->delete_data_by_pk('tbl_pemesanan', 'kd_pemesanan', $kd_pemesanan);
			$this->Mcrud->delete_data_by_pk('tbl_keranjang', 'kd_pemesanan', $kd_pemesanan);

			redirect("admin/pemesanan");
	}

	public function lap_anggota()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}

			$data['v_admin']   = $this->Mcrud->get_data('tbl_admin');
			$data['v_anggota'] = $this->Mcrud->get_data('tbl_anggota');

			$this->load->view('admin/laporan/lap_anggota', $data);

	}

	public function lap_barang()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}

			$data['v_admin']   = $this->Mcrud->get_data('tbl_admin');
			$data['v_barang']  = $this->Mcrud->get_data_join('tbl_barang', 'tbl_kategori', 'id_kategori');

			$this->load->view('admin/laporan/lap_barang', $data);

	}


	public function lap_pemesanan()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}

			$data['v_admin']   = $this->Mcrud->get_data('tbl_admin');

			$this->load->view('admin/header', $data);
			$this->load->view('admin/laporan/lap_pemesanan', $data);
			$this->load->view('admin/footer');

	}


	public function cetak_pemesanan()
	{
		$ceks = $this->session->userdata('username@pertanian');
		if(!isset($ceks)) {
			redirect('admin/login');
		}

		if (isset($_POST['btncetak'])) {
				$tgl1 = $_POST['tgl1'];
				$tgl2 = $_POST['tgl2'];

				$data['v_pemesanan'] = $this->db->query("SELECT * FROM tbl_pemesanan WHERE (tgl_pemesanan BETWEEN '$tgl1' AND '$tgl2') AND status='sukses'");

				$this->load->view('admin/laporan/cetak_pemesanan', $data);
		}else{
			redirect('admin/lap_pemesanan');
		}
	}

}


