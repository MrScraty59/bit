<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Examens extends CI_Controller {

    public function index() {
        $data = Array();
        $data['examens'] = $this->examen->getAll();
        foreach($data['examens'] as $exam){
            $exam->cours = $this->cour->constructeur($exam->idCours)[0];
        }
        
        $this->load->view('template/header');
        $this->load->view('pages/examens/liste',$data);
        $this->load->view('template/footer');
    }

    public function creer() {
        //Initialisation des données
        $data = Array();
        $data['cours'] = $this->cour->getAll();

        //Validation du formulaire
        $this->form_validation->set_rules('cours', 'Cours', 'trim|xss_clean|encode_php_tags|required|numeric');
        $this->form_validation->set_rules('titre', 'Titre', 'trim|xss_clean|encode_php_tags|required');

        if ($this->input->post() && $this->form_validation->run()) {
            //Le formualire est valide, on va créer l'examen
            $examen = new stdClass();
            $examen->idCours = $this->input->post('cours');
            $examen->nom = $this->input->post('titre');
            //On envoie l'examen en BDD
            
            $examen->id = $this->examen->add($examen);
            
            var_dump($this->input->post());
            
            $questions = $this->input->post('questions');
            $typeQuestions = $this->input->post('typeQuestion');
            $reponses = $this->input->post('reponse');
            $points = $this->input->post('points');
            $size = sizeof($questions);
            
            for($i =1; $i < $size; $i++){
                $question = new StdClass();
                $question->idExamen = $examen->id;
                $question->question = $questions[$i][0];
                $question->type = $typeQuestions[$i][0];
                if($question->type == "multiple"){
                    $question->propositions = json_encode($reponses[$i]);
                }
                $question->points = $points[$i][0];
                //$this->question->add($question);
            }
        }

        $this->load->view('template/header');
        $this->load->view('pages/examens/creer', $data);
        $this->load->view('template/footer');
    }

    public function programmer($idExamen = 0) {
        if ($idExamen == 0) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        //Formulaire
        //
        
    }
    
    public function delete($id = 0) {

        $this->examen->delete($id);

        redirect('examens');
    }

}
