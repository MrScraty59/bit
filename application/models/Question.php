<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question extends CI_Model {

    protected $table = 'question';
    protected $response = 'reponsesEtudiant';

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

    public function getFromExamen($id){

        $result = $this->db->select('*')
                ->from($this->table)
                ->where('idExamen', $id)
                ->get()
                ->result();

        return $result;
    }

    public function add($data) {

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();;
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
    
    public function getFromExamenAndResponse($id){

        $result = $this->db->select('*')
                ->from($this->table .' as q')
                ->join($this->response .' as r', 'q.id=r.idQuestion')
                ->where('idExamen', $id)
                ->order_by("q.id","ASC")
                ->get()
                ->result();

        return $result;
    }
    public function updateNote($id,$note, $idUtil){
        return $this->db->set('note', $note)
                ->where('id', $id)
                ->where('idEtudiant', $idUtil)
                ->update($this->response);
    }
}
