<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanTransaksi_model extends CI_Model
{
    private $_table = "tbl_laporan_transaksi";
    
    public $kd_laporan_transaksi;
    public $kd_user;
    public $kegiatan;

    public function tambahLaporanTransaksi($keterangan, $tabel)
    {
        $post = $this->input->post();
        $this->kd_laporan_transaksi = "";
        $this->kd_user = decrypt_url($this->session->userdata("kode_user"));
        $this->kegiatan = $keterangan. $tabel. ", kode barang = ". $post["kd_barang"]. ", jumlah barang dibeli = ". $post["jumlah_beli"]. ", total harga = Rp. ". number_format($post["total_harga"]);
        return $this->db->insert($this->_table, $this);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_laporan_transaksi" => $id])->row();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    
}