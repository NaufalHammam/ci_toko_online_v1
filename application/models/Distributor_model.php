<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor_model extends CI_Model
{
    private $_table = "tbl_distributor";

    public $kd_distributor;
    public $nama_distributor;
    public $alamat_distributor;
    public $no_telp;

    public function rules()
    {
        return [
            ['field' => 'nama_distributor',
            'rules' => 'required'],

            ['field' => 'alamat_distributor',
            'rules' => 'required'],

            ['field' => 'no_telp',
            'rules' => 'numeric']
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_distributor" => $id])->row();
    }
    

    public function save()
    {
        $post = $this->input->post();
        $this->kd_distributor = "";
        $this->nama_distributor = $post["nama_distributor"];
        $this->alamat_distributor = $post["alamat_distributor"];
        $this->no_telp = $post["no_telp"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kd_distributor = $post["id"];
        $this->nama_distributor = $post["nama_distributor"];
        $this->alamat_distributor = $post["alamat_distributor"];
        $this->no_telp = $post["no_telp"];
        return $this->db->update($this->_table, $this, array('kd_distributor' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kd_distributor" => $id));
    }
}