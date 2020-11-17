<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_table = "tbl_barang";

    public $kd_barang;
    public $nama_barang;
    public $kd_merek;
    public $kd_distributor;
    public $tanggal_masuk;
    public $harga_barang;
    public $stok_barang;
    public $keterangan;

    public function rules()
    {
        return [
            ['field' => 'nama_barang',
            'rules' => 'required'],

            ['field' => 'kd_merek',
            'rules' => 'required'],
            
            ['field' => 'kd_distributor',
            'rules' => 'required'],

            ['field' => 'tanggal_masuk',
            'rules' => 'date'],

            ['field' => 'harga_barang',
            'rules' => 'numeric'],

            ['field' => 'stok_barang',
            'rules' => 'numeric'],

            ['field' => 'keterangan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getStok()
    {
        return $this->db->query("SELECT * FROM tbl_barang WHERE stok_barang > 0 ")->result();
    }

    public function getByTanggalMasuk($dari, $sampai)
    {
        return $this->db->query("SELECT * FROM tbl_barang WHERE tanggal_masuk >= '$dari' AND tanggal_masuk <= '$sampai' ")->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_barang" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kd_barang = "";
        $this->nama_barang = $post["nama_barang"];
        $this->kd_merek = $post["kd_merek"];
        $this->kd_distributor = $post["kd_distributor"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->harga_barang = $post["harga_barang"];
        $this->stok_barang = $post["stok_barang"];
        $this->keterangan = $post["keterangan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kd_barang = $post["id"];
        $this->nama_barang = $post["nama_barang"];
        $this->kd_merek = $post["kd_merek"];
        $this->kd_distributor = $post["kd_distributor"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->harga_barang = $post["harga_barang"];
        $this->stok_barang = $post["stok_barang"];
        $this->keterangan = $post["keterangan"];
        return $this->db->update($this->_table, $this, array('kd_barang' => $post['id']));
    }

    public function updateSisaStok()
    {
        $post = $this->input->post();
        $kode_barang = $post["kd_barang"];
        $jumlah_dibeli = $post["jumlah_beli"];
        $stok_barang = $post["stok_barang"];
        $sisa_stok = $stok_barang - $jumlah_dibeli;
        $this->db->query("UPDATE tbl_barang SET stok_barang = '$sisa_stok' WHERE kd_barang = '$kode_barang'");

    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kd_barang" => $id));
    }
}