<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata("status") != "login"){
            redirect(site_url('login'));
        }else{
            if($this->session->userdata("level") == 2 || $this->session->userdata("level") == 3){
                $this->load->model("transaksi_model");
                $this->load->model("barang_model");
                $this->load->library('form_validation');   
                $this->load->model("user_model");
                $this->load->model("laporantransaksi_model");
            }else{
                $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
                redirect(site_url('test/overview'));
            }

        }
    }

    public function index()
    {

        $data["users"] = $this->user_model->getAll();
        $data["barangs"] = $this->barang_model->getAll();
        $data["transaksis"] = $this->transaksi_model->getAll();
        $this->load->view("kasir/transaksiDataView", $data);
        
    }

    public function add()
    {
        if($this->session->userdata("level") == 3){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }
        $barang = $this->barang_model;
        $data["barangs"] = $this->barang_model->getStok();
        
        
        if (!$data["barangs"]) show_404();
        $post = $this->input->post();
        if(isset($post["kd_barang"])){
            $kode_barang = $post["kd_barang"];
            $jumlah_beli = $post["jumlah_beli"];

            
            $data["barang"] = $barang->getById($kode_barang);

            $stok_barang = $data['barang']->stok_barang;

            if($jumlah_beli > $stok_barang){
                echo "<script>alert('stok kurang')</script>";
                $this->load->view("kasir/transaksiAdd", $data);
            }else{
                $data['lanjutan'] = [$kode_barang, $jumlah_beli];
                $this->load->view("kasir/transaksiAddNext", $data);
            }

        }else{
            $this->load->view("kasir/transaksiAdd", $data);
        }
        
        
        
    }

    public function addNext()
    {
        if($this->session->userdata("level") == 3){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }
        $barang = $this->barang_model;
        $laporan = $this->laporantransaksi_model;
        $data["barangs"] = $this->barang_model->getAll();

        $transaksi = $this->transaksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());

        if ($validation->run()) {
            $transaksi->save();
            $barang->updateSisaStok();
            $laporan->tambahLaporanTransaksi("Menambahkan ", "transaksi");
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('kasir/transaksis');
        }

        $this->load->view("kasir/transaksiAdd", $data);

    }

    public function edit($id = null)
    {
        if($this->session->userdata("level") == 3){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }
        if (!isset($id)) redirect('kasir/transaksis');
        
        $id = decrypt_url($id);

        $transaksi = $this->transaksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());

        if ($validation->run()) {
            $transaksi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["transaksi"] = $transaksi->getById($id);
        if (!$data["transaksi"]) show_404();

        $data["barangs"] = $this->barang_model->getAll();
        if (!$data["barangs"]) show_404();
        
        $this->load->view("kasir/transaksiEdit", $data);
    }

    public function delete($id=null)
    {
        if($this->session->userdata("level") == 3){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }
        $id = decrypt_url($id);
        if (!isset($id)) show_404();
        
        if ($this->transaksi_model->delete($id)) {
            redirect(site_url('kasir/transaksis'));
        }
    }
}