<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {   
        if($this->session->userdata("level") != 1 ){
                $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
                redirect(site_url('test/overview'));
        }else{
            $data["users"] = $this->user_model->getAll();
            $this->load->view("master/user/userDataView", $data);
            $post = $this->input->post();
        }
    }

    public function add()
    {
        if($this->session->userdata("level") != 1 ){
                $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
                redirect(site_url('test/overview'));
        }else{
            $user = $this->user_model;
            $validation = $this->form_validation;
            $validation->set_rules($user->rules());

            if ($validation->run()) {
                $post = $this->input->post();
                $isi_username = $post["username"];
                $cek = $this->db->query("SELECT * FROM tbl_user WHERE username = '$isi_username'")->num_rows();
                if($cek > 0){
                    echo "<script>alert('Username telah di gunakan')</script>";
                }else{
                    $user->save();
                    $this->session->set_flashdata('success', 'Berhasil disimpan');
                    redirect('master/users');
                }
                
            }

            $this->load->view("master/user/userAdd");
        }
    }

    public function edit($id = null)
    {
        //echo $id;
        if (!isset($id)) redirect('master/users');
        $id = decrypt_url($id);

        $user = $this->user_model;
        $post = $this->input->post();
        
        if(isset($post["password_lama"])){
            
            $kd_user = $post['id'];
            $pass_lama = md5($post["password_lama"]);
            $pass_baru = md5($post["password_baru"]);

            $cek = $this->db->query("SELECT * FROM tbl_user WHERE kd_user = '$kd_user' AND password = '$pass_lama'")->num_rows();
            if($cek > 0){

                if($this->password = $post["password_baru"] == $this->password = $post["konfirmasi_password_baru"]){            
                    $ganti_password = $this->db->query("UPDATE tbl_user SET password = '$pass_baru' WHERE kd_user = '$kd_user'");
                    if($ganti_password){
                        $this->session->set_flashdata('berhasil', 'Berhasil diubah');
                        redirect('test/overview');
                    }else{
                        echo "<script>alert('Data gagal disimpan')</script>";
                    }
                }else{
                    echo "<script>alert('Password tidak sesuai')</script>";
                }
            }else{
                echo "<script>alert('Password lama salah')</script>";
            }
        }
            
        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("master/user/userEditPW", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        if($this->session->userdata("level") != 1 ){
            $this->session->set_flashdata('danger', 'Anda tidak memiliki akses untuk itu');
            redirect(site_url('test/overview'));
        }else{
            if ($this->user_model->delete($id)) {
                redirect(site_url('master/users'));
                $this->session->set_flashdata('success', 'Berhasil dihapus');
            }
        }
    }

    

}