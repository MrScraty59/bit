<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examens extends CI_Controller {

	public function creer($idMatiere = 0)
	{
            if($idMatiere == 0){
                redirect('/accueil');
            }
            
            $this->form_validation->set_rules('cours','Cours','trim|xss_clean|php_encode_tags|required|number');
            $this->form_validation->set_rules('','','');
            $this->form_validation->set_rules('','','');
            $this->form_validation->set_rules('','','');
            $this->form_validation->set_rules('','','');
            $this->form_validation->set_rules('','','');
            
            if($this->input->post() && $this->form_validation->run()){
                
                $examen = new stdClass();
                $examen->idCours = $this->input->post('cours');
                $examen->debutExam = $this->input->post('debutExam');
                $examen->finExam = $this->input->post('finExam');
                $examen->nom = $this->input->post('nom');
                $examen->id = $this->examen->add($examen);                
            }
            
            $this->load->view('template/header');
            $this->load->view('pages/examens/creer');
            $this->load->view('template/footer');
	}
}
