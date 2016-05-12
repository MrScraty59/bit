<?php

class Plannings extends CI_Controller {
    
    public function index() {

        $data = array();

        $user = $this->session->userData("user");

        $data['plannings'] = $this->planning->getByIdClasse($user->idClasse);
        $data['exams'] = Array();
        if(!empty($data['plannings'])){
            foreach($data['plannings'] as $planning){
                $planning->examens = Array();
                //On va vérifier qu'ils sont ulterieurs
                $date = date("d-m-Y H:i");
                $time = strtotime($date);
                var_dump($time);
                if($planning->debut > $time){
                    array_push($planning->examens, $this->examen->constructeur($planning->idExamen)[0]);
                }else{
                    continue;
                }
            }
        }

        $this->load->view('template/header');
        $this->load->view('pages/planning/liste', $data);
        $this->load->view('template/footer');
    }

}
?>