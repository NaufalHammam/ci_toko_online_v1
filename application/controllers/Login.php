<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');	   
	}
 
	function index(){
		if($this->session->userdata("status") == "login"){
			$this->session->set_flashdata('success', 'Anda telah login');
            redirect(site_url('test/overview'));
        }else{
			$this->load->view("login");
		}
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->login_model->cek_login("tbl_user",$where)->num_rows();
		if($cek > 0){
 			
 			$isi_akun = $this->login_model->cek_login("tbl_user",$where)->row();
 			$array_isi_akun = [];
 			foreach ($isi_akun as $isinya):
 				array_push($array_isi_akun, $isinya);
 			endforeach;

			$data_session = array(
				'kode_user' => encrypt_url($array_isi_akun[0]),
				'nama' => $array_isi_akun[1],
				'level' => $array_isi_akun[4],
				'status' => "login"
				);
 		
		$this->session->set_userdata($data_session);
 
		redirect(site_url("master_controller"));
 
		}else{
			echo "<script>alert('username atau password salah')</script>";
			$this->load->view("login");
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}


}