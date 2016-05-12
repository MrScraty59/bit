<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Model {

    protected $table = 'users';

    public function constructeur($id = 0) {
        if ($id == 0) {
            return false;
        }

        $result = $this->db->select('*')
                ->from($this->table)
                ->where('Id', $id)
                ->limit(1)
                ->get()
                ->result();
        
        return $result;
    }

    public function getProfs() {

        $result = $this->db->select('*')
                ->from($this->table)
                ->where('droit',1)
                ->get()
                ->result();

        return $result;
    }

    public function getEleves() {

        $result = $this->db->select('*')
                ->from($this->table)
                ->where('droit',0)
                ->get()
                ->result();

        return $result;
    }

    public function getFromLogin($data) {

        $result = $this->db->select('*')
                ->from($this->table)
                ->where('login',$data)
                ->get()
                ->result();

        return $result;
    }

    public function add($data) {

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function delete($data = '') {

        if ($data == '') {
            return false;
        }

        $result = $this->db->delete($this->table, array('id' => $data));

        return $result;
    }

    public function update($data = '', $id = 0) {

        if ($data == '' || $id == 0) {
            return false;
        }
        $result = $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $result;
    }

    public function getUserByEmail($email){

        return $this->db->select('*')
                ->from($this->table)
                ->where('mail', $email)
                ->limit(1)
                ->get()
                ->result();
    }

}
