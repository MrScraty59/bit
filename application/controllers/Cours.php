<?php

class Cours extends CI_Controller {
    
    public function liste() {
        $data = Array(); 
        $data['cours'] = $this->cour->getAll();
        $this->load->view('template/header');
        $this->load->view('pages/classes/liste', $data);
        $this->load->view('template/footer');
    }

    public function creer() {
        //Initialisation des données
        $data = Array();
                
        //Validation du formulaire
        $this->form_validation->set_rules('intitule', 'Intitulé', 'trim|xss_clean|encode_php_tags|required');

        if ($this->input->post() && $this->form_validation->run()) {
            //Le formualire est valide, on va créer l'examen
            $cour = new StdClass();
            $cour->intitule = $this->input->post('intitule');
            
            $this->cour->add($cour);
            redirect(base_url('cours/liste'));
        }

        $this->load->view('template/header');
        $this->load->view('pages/cours/creer', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = 0) {

        $this->cour->delete($id);

        redirect('cours/liste/');
    }

}

?>