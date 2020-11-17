<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Merek_model extends CI_Model
{
    private $_table = "tbl_merek";

    public $kd_merek;
    public $nama_merek;

    public function rules()
    {
        return [
            ['field' => 'nama_merek',
            'rules' => 'required'],
            
        ];
    }

    

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_merek" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kd_merek = "";
        $this->nama_merek = $post["nama_merek"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kd_merek = $post["id"];
        $this->nama_merek = $post["nama_merek"];
        return $this->db->update($this->_table, $this, array('kd_merek' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kd_merek" => $id));
    }
}