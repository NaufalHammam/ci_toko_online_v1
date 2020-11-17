<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Distributors extends CI_Controller
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
                $this->load->model("distributor_model");
                $this->load->model("laporanmaster_model");
                $this->load->library('form_validation');
            }
        }
    }

    public function index()
    {
        $data["distributors"] = $this->distributor_model->getAll();
        $this->load->view("master/distributor/distributorDataView", $data);
    }

    public function add()
    {
        $distributor = $this->distributor_model;
        $laporan = $this->laporanmaster_model;

        $validation = $this->form_validation;
        $validation->set_rules($distributor->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $isi_nama_distributor = $post["nama_distributor"];
            $cek_nama_distributor = $this->db->query("SELECT * FROM tbl_distributor WHERE nama_distributor = '$isi_nama_distributor'")->num_rows();
            if($cek_nama_distributor > 0){
                echo "<script>alert('Nama distributor telah tersedia')</script>";
            }else{
                $distributor->save();
                $laporan->tambahLaporanMaster("Menambahkan ", "distributor", "");
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect('master/distributors');
            }
        }

        $this->load->view("master/distributor/distributorAdd");
    }

    public function edit($id = null)
    {
        //echo $id;
        
        if (!isset($id)) redirect('master/distributors');
        $id = decrypt_url($id);

        $distributor = $this->distributor_model;
        $laporan = $this->laporanmaster_model;

        $validation = $this->form_validation;
        $validation->set_rules($distributor->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $isi_nama_distributor = $post["nama_distributor"];
            $cek_nama_distributor = $this->db->query("SELECT * FROM tbl_distributor WHERE nama_distributor = '$isi_nama_distributor'")->num_rows();
            if($cek_nama_distributor > 0){
                echo "<script>alert('Nama distributor telah tersedia')</script>";
            }else{
                $distributor->update();
                $laporan->tambahLaporanMaster("Mengubah isi ", "distributor", "");
                $this->session->set_flashdata('success', 'Berhasil diupdate');
                redirect('master/distributors');
            }
        }

        $data["distributor"] = $distributor->getById($id);
        if (!$data["distributor"]) show_404();
        
        $this->load->view("master/distributor/distributorEdit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        $id = decrypt_url($id);

        $laporan = $this->laporanmaster_model;
        
        if ($this->distributor_model->delete($id)) {
            $laporan->tambahLaporanMaster("Menghapus ", "distributor", $id);
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('master/distributors'));
        }
    }
}