<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mereks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata("status") != "login"){
            redirect(site_url('login'));
        }else{
            if($this->session->userdata("level") != 1 ){
                $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
                redirect(site_url('test/overview'));
            }else{
                $this->load->model("merek_model");
                $this->load->model("laporanmaster_model");
                $this->load->library('form_validation');
            }
        }
    }

    public function index()
    {
        $data["mereks"] = $this->merek_model->getAll();
        $this->load->view("master/merek/merekDataView", $data);
    }

    public function add()
    {
        $merek = $this->merek_model;
        $laporan = $this->laporanmaster_model;

        $validation = $this->form_validation;
        $validation->set_rules($merek->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $isi_nama_merek = $post["nama_merek"];
            $cek_nama_merek = $this->db->query("SELECT * FROM tbl_merek WHERE nama_merek = '$isi_nama_merek'")->num_rows();
            if($cek_nama_merek > 0){
                echo "<script>alert('Nama merek telah tersedia')</script>";
            }else{
                $merek->save();
                $laporan->tambahLaporanMaster("Menambahkan ", "merek", "");
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect('master/mereks');
            }
            
        }

        $this->load->view("master/merek/merekAdd");
    }

    public function edit($id = null)
    {
        //echo $id;
        if (!isset($id)) redirect('master/mereks');
        
        $id = decrypt_url($id);
        $merek = $this->merek_model;
        $laporan = $this->laporanmaster_model;

        $validation = $this->form_validation;
        $validation->set_rules($merek->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $isi_nama_merek = $post["nama_merek"];
            $isi_id = $post["id"];
            $cek_nama_merek = $this->db->query("SELECT * FROM tbl_merek WHERE nama_merek = '$isi_nama_merek' AND kd_merek != '$isi_id'")->num_rows();
            if($cek_nama_merek > 0){
                echo "<script>alert('Nama merek telah tersedia')</script>";
            }else{
                $merek->update();
                $laporan->tambahLaporanMaster("Mengubah isi ", "merek", "");
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect('master/mereks');
            }
            
        }

        $data["merek"] = $merek->getById($id);
        if (!$data["merek"]) show_404();
        
        $this->load->view("master/merek/merekEdit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        $id = decrypt_url($id);   
        $laporan = $this->laporanmaster_model;

        if ($this->merek_model->delete($id)) {
            $laporan->tambahLaporanMaster("Menghapus ", "merek", $id);
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('master/mereks');
        }
    }
}