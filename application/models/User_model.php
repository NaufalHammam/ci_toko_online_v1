<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tbl_user";

    public $nama;
    public $username;
    public $password;
    public $level_user;
    public $created_at;
    public $created_by;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'rules' => 'required'],

            ['field' => 'username',
            'rules' => 'required'],

            ['field' => 'password',
            'rules' => 'required'],

            ['field' => 'level_user',
            'rules' => 'required'],


            ['field' => 'created_by',
            'rules' => 'required']
            
        ];
    }

    

    public function getLimit()
    {
        return $this->db->limit(10)->order_by('kd_user', 'DESC')->get($this->_table)->result();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kd_user = "";
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = md5($post["password"]);
        $this->level_user = $post["level_user"];
        $this->created_by = $post['created_by'];
        return $this->db->insert($this->_table, $this);
    }

    

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kd_user" => $id));
    }
}