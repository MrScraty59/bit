<?php

class Plannings extends CI_Controller {
    
    public function index() {

        $me = $this->session->userData("user");

        $plannings = $this->planning->getByIdClasse($me->idClasse);

        if(!empty($plannings)){

            foreach($plannings as $planning){

                $exams[] = $this->examen->constructeur($planning->idExamen);
            }
        }

        $data['exams'] = $exams;

        $this->load->view('template/header');
        $this->load->view('pages/eleves/planning', $data);
        $this->load->view('template/footer');


    }

}

?>