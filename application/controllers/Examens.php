<?php
header('Content-Type: text/html; charset=utf-8');
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
        $data['examen'] = $this->examen->constructeur($idExamen)[0];
        $data['classes'] = $this->classe->getClasses();
        if(!$data['examen']):
            redirect($_SERVER['HTTP_REFERER']);
        endif;
        
        $this->form_validation->set_rules('date_debut', 'Date de début', 'trim|xss_clean|encode_php_tags|required');
        $this->form_validation->set_rules('heure', 'Heure', 'trim|xss_clean|encode_php_tags|required');
        $this->form_validation->set_rules('duree', 'Durée', 'trim|xss_clean|encode_php_tags|required');
        
        if($this->form_validation->run()){
            
            $stamp = strtotime($this->input->post('date_debut') . ' ' . $this->input->post('heure'));
            date_default_timezone_set('UTC');
            $date = date("d-m-Y H:i", $stamp);
            $time = strtotime($date);
            $prog = new StdClass();
            $prog->idExamen = $idExamen;
            $prog->idClasse = $this->input->post('classe');
            $prog->debut = $time;
            $prog->duree = $this->input->post('duree');
            $this->prog->add($prog);
        }
        
        $this->load->view('template/header');
        $this->load->view('pages/examens/programmer', $data);
        $this->load->view('template/footer');
    }
    
    public function delete($id = 0) {

        $this->examen->delete($id);

        redirect('examens');
    }
    
    public function passer($id = 0) {
        $user = $this->session->userdata('user');
        $data = Array();
        $data['examen'] = $this->examen->constructeur($id)[0];
        if(!$data['examen']):
            redirect($_SERVER['HTTP_REFERER']);
        endif;
        
        $data['examen']->questions = Array();
        $data['examen']->cours = $this->cour->constructeur($data['examen']->idCours)[0];
        $data['examen']->questions = $this->question->getFromExamen($id);
        shuffle($data['examen']->questions);
        
        
        if($this->input->post()):
            foreach($data['examen']->questions as $question):
                $reponses = new stdClass(); 
                $reponses->idEtudiant = $user->id;
                $reponses->idQuestion = $question->id;
                $reponses->reponses = json_encode($this->input->post('reponses')[$question->id]);
                $this->reponsesEtudiant->add($reponses);
            endforeach;
        endif;
        
        $this->load->view('template/header');
        $this->load->view('pages/examens/passer', $data);
        $this->load->view('template/footer');
    }
    
    public function corriger($idEtudiant, $idExamen){
        $data['etudiant'] = $this->user->getUserById($idEtudiant);
        $data['examen'] = $this->examen->getExamenByIdAndCours($idExamen);
        $data['question'] = $this->question->getFromExamenAndResponse($idExamen);
        $this->load->view('template/header');
        $this->load->view('pages/examens/corriger', $data);
        $this->load->view('template/footer');
    }
    
    public function notation($idClasse){
        $this->form_validation->set_rules('points', 'Points', 'trim|xss_clean|encode_php_tags|required|numeric');
        var_dump($this->input->post());
        foreach ($this->input->post('points') as $key => $value) {
            $this->question->updateNote($key,$value);
        }
        // faire un retour a la liste des examens a corriger.
        redirect('classes/listeEleves/'.$idClasse);
    }
    

}
