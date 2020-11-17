<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanMaster_model extends CI_Model
{
    private $_table = "tbl_laporan_master";
    
    public $kd_laporan_master;
    public $kd_user;
    public $kegiatan;

    public function tambahLaporanMaster($keterangan, $tabel, $id)
    {
        
        $post = $this->input->post();
        $this->kd_laporan_master = "";
        $this->kd_user = decrypt_url($this->session->userdata("kode_user"));

        if($tabel == "barang"){
            
            if($keterangan == "Menambahkan " && $id == ""){
                $this->kegiatan = "Menambahkan ". $tabel. " dengan nama barang = ". $post["nama_barang"];
            }elseif ($keterangan = "Mengubah isi " && $id == "") {
                $this->kegiatan = "Mengubah isi ". $tabel. " dengan kode barang = ". $post["id"]. " yang diubah : Nama barang = ".$post["nama_barang"]. ", Kode merek = ". $post["kd_merek"]. ", Kode distributor = ". $post['kd_distributor']. ", Tanggal masuk = ". $post['tanggal_masuk']. ", Harga barang = Rp. ". number_format($post['harga_barang']). ", Stok barang = ". $post['stok_barang']. ", Keterangan = ". substr($post['keterangan'], 1, 10);
            }else{
                $this->kegiatan = "Menghapus ". $tabel. " dengan kode barang = ". $id;
            }


        }elseif ($tabel == "merek") {
            
            if($keterangan == "Menambahkan " && $id == ""){
                $this->kegiatan = "Menambahkan ". $tabel. " dengan nama merek = ". $post["nama_merek"];
            }elseif ($keterangan = "Mengubah isi " && $id == "") {
                $this->kegiatan = "Mengubah isi ". $tabel. " dengan kode merek = ". $post["id"]. " yang diubah : Nama merek =". $post["nama_merek"];;
            }else{
                $this->kegiatan = "Menghapus ". $tabel. " dengan kode merek = ". $id;
            }



        }elseif ($tabel == "distributor") {
            
            if($keterangan == "Menambahkan " && $id == ""){
                $this->kegiatan = "Menambahkan ". $tabel. " dengan nama distributor = ". $post["nama_distributor"];
            }elseif ($keterangan = "Mengubah isi " && $id == "") {
                $this->kegiatan = "Mengubah isi ". $tabel. " dengan kode distributor = ". $post["id"]. " yang diubah : Nama distributor =". $post["nama_distributor"]. ", Alamat ditributor = ". $post["alamat_distributor"]. ", No telepon = ". $post["no_telp"];
            }else{
                $this->kegiatan = "Menghapus ". $tabel. " dengan kode distributor = ". $id;
            }
        }
            
        return $this->db->insert($this->_table, $this);
    }


    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_laporan_master" => $id])->row();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
   
    
    
}