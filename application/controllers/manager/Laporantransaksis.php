<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporantransaksis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata("status") != "login"){
            redirect(site_url('login'));
        }else{
            if($this->session->userdata("level") == 3){
                $this->load->model("laporantransaksi_model");
                $this->load->model("user_model");
                $this->load->library('form_validation');
            }else{
                $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
                redirect(site_url('test/overview'));
            }
        }
    }

    public function index()
    {
        $data["laporantransaksis"] = $this->laporantransaksi_model->getAll();
        $data["users"] = $this->user_model->getAll();
        $this->load->view("laporan/laporanTransaksiDataView", $data);
        
    }

    public function view($id = null)
    {
        if (!isset($id)) redirect('manager/laporantransaksis');
        $id = decrypt_url($id);
        $laporan = $this->laporantransaksi_model;
        $data["laporantransaksi"] = $laporan->getById($id);
        if (!$data["laporantransaksi"]) show_404();

        $kode_user = $data['laporantransaksi']->kd_user;

        $user = $this->user_model;
        $data["user"] = $user->getById($kode_user);
        if (!$data["user"]) show_404();

        $this->load->view("laporan/laporanTransaksiOneView", $data);
        
    }
    
}