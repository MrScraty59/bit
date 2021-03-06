<?php

class Classes extends CI_Controller {
    
    public function liste() {
        $data = Array(); 
        $data['classes'] = $this->classe->getClasses();
        $this->load->view('template/header');
        $this->load->view('pages/classes/liste', $data);
        $this->load->view('template/footer');
    }

    public function creer() {
        //Initialisation des données
        $data = Array();
        $data["cours"] = $this->cour->getAll();  
              
        //Validation du formulaire
        $this->form_validation->set_rules('intitule', 'Intitulé', 'trim|xss_clean|encode_php_tags|required');

        if ($this->input->post() && $this->form_validation->run()) {
            //Le formualire est valide, on va créer l'examen
            $classe = new StdClass();
            $classe->intitule = $this->input->post('intitule');
            $classe->coursIds = json_encode($this->input->post('coursIds'));
      
            $this->classe->add($classe);
            redirect(base_url('classes/liste'));
        }

        $this->load->view('template/header');
        $this->load->view('pages/classes/creer', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = 0) {

        $this->classe->delete($id);

        redirect('classes/liste/');
    }
    public function edit($id = 0) {
        //Initialisation des données
        $data = Array();
        $data["classe"] = $this->classe->constructeur($id);
        $data["cours"] = $this->cour->getAll();
        
        $this->load->view('template/header');
        $this->load->view('pages/classes/edit', $data);
        $this->load->view('template/footer');
    }
    public function listeEleves($id) {
        
        $data=array();
    
        $liste = $this->user->getUserByidClasse($id);

        if(!empty($liste))
        {
            foreach($liste as $a_user)
            {
                $note[$a_user->id]=$this->user->getNote($id, $a_user->id);
            }
        }

        $data['liste'] = $liste;
        $data['id'] = $id;
        $data['note'] = $note;

        $this->load->view('template/header');
        $this->load->view('pages/classes/listeEleves', $data);
        $this->load->view('template/footer');
    }
}
?>