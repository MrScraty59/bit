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
                if(intval($planning->debut) > $time){
                    $planning->examen = $this->examen->constructeur($planning->idExamen)[0];
                    $planning->examen->cours = $this->cour->constructeur($planning->examen->idCours)[0];
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