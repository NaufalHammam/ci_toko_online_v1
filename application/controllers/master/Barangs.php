<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barangs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata("status") != "login"){
            redirect(site_url('login'));
        }else{
            if($this->session->userdata("level") == 1 || $this->session->userdata("level") == 3){
                $this->load->model("barang_model");
                $this->load->model("distributor_model");
                $this->load->model("merek_model");
                $this->load->model("laporanmaster_model");
                $this->load->library('form_validation');  
            }else{
                $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
                redirect(site_url('test/overview'));
            } 
        }
    }

    public function index()
    {
        $data["mereks"] = $this->merek_model->getAll();
        $data["distributors"] = $this->distributor_model->getAll();
        $post = $this->input->post();
        
        if(isset($post["search_dari"]) || isset($post["search_dari"])){
            $search_dari = $post["search_dari"];
            $search_sampai = $post["search_sampai"];
            if($search_dari == '' || $search_sampai == ''){
                echo "<script>alert('syarat pencarian tidak terpenuhi')</script>";
                $data["barangs"] = $this->barang_model->getAll();
                $this->load->view("master/barang/barangDataView", $data);
            }else{
                $data["barangs"] = $this->barang_model->getByTanggalMasuk($search_dari, $search_sampai);
                $this->load->view("master/barang/barangDataView", $data);
            }   
        }else{
            $data["barangs"] = $this->barang_model->getAll();
            $this->load->view("master/barang/barangDataView", $data);
        }
        
    }

    public function add()
    {
        if($this->session->userdata("level") == 3){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }
        $barang = $this->barang_model;
        $laporan = $this->laporanmaster_model;

        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $post = $this->input->post();

            $isi_nama_barang = $post["nama_barang"];
            $cek_nama_barang = $this->db->query("SELECT * FROM tbl_barang WHERE nama_barang = '$isi_nama_barang'")->num_rows();
            if($cek_nama_barang > 0){
                echo "<script>alert('Nama barang sudah tersedia')</script>";
            }else{
                $isi_stok = $post["stok_barang"];
                $isi_harga = $post["harga_barang"];
                if($isi_stok > 0 && $isi_harga > 0){
                    $barang->save();
                    $laporan->tambahLaporanMaster("Menambahkan ", "barang", "");
                    $this->session->set_flashdata('success', 'Berhasil disimpan');
                    redirect('master/barangs');
                }else{
                    echo "<script>alert('Stok atau Harga tidak boleh dibawah 0')</script>";
                }
            }
            
                
        }

        $data["distributors"] = $this->distributor_model->getAll();
        $data["mereks"] = $this->merek_model->getAll();
        if (!$data["distributors"]) show_404();
        if (!$data["mereks"]) show_404();
        
        $this->load->view("master/barang/barangAdd", $data);
    }

    public function edit($id = null)
    {
        if($this->session->userdata("level") == 3){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }

        if (!isset($id)) redirect('master/barangs');
        
        $id = decrypt_url($id);

        $barang = $this->barang_model;
        $laporan = $this->laporanmaster_model;

        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $isi_nama_barang = $post["nama_barang"];
            $isi_id = $post["id"];
            $cek_nama_barang = $this->db->query("SELECT * FROM tbl_barang WHERE nama_barang = '$isi_nama_barang' AND kd_barang != '$isi_id'")->num_rows();
            if($cek_nama_barang > 0){
                echo "<script>alert('Nama barang telah tersedia')</script>";
            }else{

                $isi_stok = $post["stok_barang"];
                $isi_harga = $post["harga_barang"];
                if($isi_stok > 0 && $isi_harga > 0){
                    $barang->update();
                    $laporan->tambahLaporanMaster("Mengubah isi ", "barang", "");
                    $this->session->set_flashdata('success', 'Berhasil diupdate');
                    redirect('master/barangs');
                }else{
                    echo "<script>alert('Stok atau Harga tidak boleh dibawah 0')</script>";
                }
            }
            
        }

        $data["barang"] = $barang->getById($id);
        if (!$data["barang"]) show_404();

        $data["distributors"] = $this->distributor_model->getAll();
        $data["mereks"] = $this->merek_model->getAll();
        
        if (!$data["distributors"]) show_404();
        if (!$data["mereks"]) show_404();
        
        $this->load->view("master/barang/barangEdit", $data);
    }

    public function delete($id=null)
    {
        if($this->session->userdata("level") == 3){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }

        $id = decrypt_url($id);
        if (!isset($id)) show_404();
        
        $laporan = $this->laporanmaster_model;

        if ($this->barang_model->delete($id)) {
            $laporan->tambahLaporanMaster("Menghapus ", "barang", $id);
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('master/barangs'));
        }
    }
}