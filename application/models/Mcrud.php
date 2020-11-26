<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	public function get_data($tbl)
	{
			$this->db->from($tbl);
			$query = $this->db->get();

			return $query;
	}

	public function get_data_by_pk($tbl, $where, $id)
	{
				$this->db->from($tbl);
				$this->db->where($where,$id);
				$query = $this->db->get();

				return $query;
	}

	public function get_data_join($tbl, $tbl2, $join)
	{
			$this->db->from($tbl);
			$this->db->join($tbl2, "$tbl2.$join=$tbl.$join");
			$this->db->order_by('id_barang', 'DESC');
			$query = $this->db->get();

			return $query;
	}

	public function get_data_join_order_limit($tbl, $tbl2, $join, $id, $order, $limit)
	{
			$this->db->from($tbl);
			$this->db->join($tbl2, "$tbl2.$join=$tbl.$join");
			$this->db->order_by("$tbl.$id", "$order");
			$this->db->limit($limit);
			$query = $this->db->get();

			return $query;
	}

	public function get_barang_by_populer_limit($limit)
	{
			$this->db->from('tbl_barang');
			$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_barang.id_kategori');
			$this->db->order_by('tbl_barang.dilihat', 'DESC');
			$this->db->limit($limit);
			$query = $this->db->get();

			return $query;
	}

	public function get_barang_by_populer_max_5()
	{
			$this->db->from('tbl_barang');
			$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_barang.id_barang');
			$this->db->order_by('tbl_barang.dilihat', 'DESC');
			$this->db->limit(5);
			$query = $this->db->get();

			return $query;
	}

	public function get_slide()
	{
			$this->db->from('tbl_slide');
			$this->db->order_by('id_slide', 'ASC');
			$query = $this->db->get();

			return $query;
	}

	public function save_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		return $this->db->insert_id();
	}

	public function update_data($tbl, $where, $data)
	{
		$this->db->update($tbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_data_by_pk($tbl, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->delete($tbl);
	}


	function view_barang($num, $offset)
	{
		$this->db->order_by('id_barang', 'DESC');
		$query = $this->db->get('tbl_barang',$num, $offset);
		return $query;
	}

	function view_barang_cari($num, $offset, $cari)
	{
		$query =$this->db->query("SELECT * FROM tbl_barang
															INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
															WHERE tbl_barang.nama_barang like '%$cari%' or tbl_kategori.nama_kategori like '%$cari%'
															ORDER BY tbl_barang.id_barang Limit $num $offset");
		return $query;
	}

	function view_barang_cari_kat($num, $offset, $id)
	{
		$query =$this->db->query("SELECT * FROM tbl_barang
															INNER JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori
															WHERE tbl_kategori.id_kategori = '$id'
															ORDER BY tbl_barang.id_barang Limit $offset, $num");
		return $query;
	}

}
