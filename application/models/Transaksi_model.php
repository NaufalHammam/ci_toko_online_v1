<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "tbl_transaksi";

    public $kd_transaksi;
    public $kd_barang;
    public $kd_user;
    public $jumlah_beli;
    public $total_harga;

    public function rules()
    {
        return [
            ['field' => 'kd_barang',
            'rules' => 'required'],

            ['field' => 'kd_user',
            'rules' => 'required'],

            ['field' => 'jumlah_beli',
            'rules' => 'required'],

            ['field' => 'total_harga',
            'rules' => 'required']
            
        ];
    }

    public function getAll()
    {
        return $this->db->limit(10)->order_by('kd_transaksi', 'DESC')->get($this->_table)->result();
    }


    public function getByTanggalTransaksi($id)
    {
        return $this->db->query("SELECT * FROM tbl_transaksi WHERE tanggal_beli = '$id'")->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_transaksi" => $id])->row();
    }



    public function save()
    {
        $post = $this->input->post();
        $this->kd_transaksi = "";
        $this->kd_barang = $post["kd_barang"];
        $this->kd_user = $post["kd_user"];
        $this->jumlah_beli = $post["jumlah_beli"];
        $this->total_harga = $post["total_harga"];
        
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kd_transaksi = $post["id"];
        $this->kd_barang = $post["kd_barang"];
        $this->kd_user = $post["kd_user"];
        $this->jumlah_beli = $post["jumlah_beli"];
        $this->total_harga = $post["total_harga"];
        $this->harga_barang = $post["harga_barang"];
        $this->stok_barang = $post["stok_barang"];
        $this->keterangan = $post["keterangan"];
        return $this->db->update($this->_table, $this, array('kd_transaksi' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kd_transaksi" => $id));
    }
}