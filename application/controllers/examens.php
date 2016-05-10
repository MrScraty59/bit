<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examens extends CI_Controller {
    
    public function index(){
        $this->load->view('template/header');
        $this->load->view('pages/examens/liste');
        $this->load->view('template/footer');
    }

	public function creer()
	{
            //Initialisation des données
            $data = Array();
            $data['cours'] = $this->cour->getAll();
            
            //Validation du formulaire
            $this->form_validation->set_rules('cours','Cours','trim|xss_clean|encode_php_tags|required|numeric');
            $this->form_validation->set_rules('titre','Titre','trim|xss_clean|encode_php_tags|required');
            
            if($this->input->post() && $this->form_validation->run()){
                //Le formualire est valide, on va créer l'examen
                $examen = new stdClass();
                $examen->idCours = $this->input->post('cours');
                //$examen->debutExam = $this->input->post('debutExam');
                //$examen->finExam = $this->input->post('finExam');
                $examen->nom = $this->input->post('titre');
                //On envoie l'examen en BDD
                $examen->id = $this->examen->add($examen); 
            }
            
            $this->load->view('template/header');
            $this->load->view('pages/examens/creer',$data);
            $this->load->view('template/footer');
	}
}
