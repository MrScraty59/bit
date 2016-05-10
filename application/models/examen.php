<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examen extends CI_Model {

    protected $table = 'examen';

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

    public function getAll() {

        $result = $this->db->select('*')
                ->from($this->table)
                ->get()
                ->result();

        return $result;
    }

    public function set_active($id) {

        $this->db->set('active', "true");
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function set_inactive($id) {

        $this->db->set('active', "false");
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function add($user) {

        $result = $this->db->insert($this->table, $user);

        return $result;
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

}
