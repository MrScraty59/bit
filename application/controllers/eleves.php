<?php

class Eleves extends CI_Controller {
    
    public function liste() {
        $data = Array();
        $data['users'] = $this->user->getEleves();

        $this->load->view('template/header');
        $this->load->view('pages/eleves/liste', $data);
        $this->load->view('template/footer');
    }

    public function creer() {
        //Initialisation des données
        $data = Array();
        
        //ALLER CHERCHER LES CLASSES!!!!!
        
        //Validation du formulaire
        $this->form_validation->set_rules('sexe', 'Sexe', 'trim|xss_clean|encode_php_tags|required');
        $this->form_validation->set_rules('login', 'Identifiant', 'trim|xss_clean|encode_php_tags|required|is_unique[users.login]');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|xss_clean|encode_php_tags|required');
        $this->form_validation->set_rules('classe', 'Classe', 'trim|xss_clean|encode_php_tags|required');
        $this->form_validation->set_rules('prenom', 'Prénom', 'trim|xss_clean|encode_php_tags|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|encode_php_tags|required|valid_email');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|xss_clean|encode_php_tags|required');
        $this->form_validation->set_rules('password_confirm', 'Mot de passe (confirmation)', 'trim|xss_clean|encode_php_tags|required|matches[password]');

        if ($this->input->post() && $this->form_validation->run()) {
            //Le formualire est valide, on va créer l'examen
            $user = new StdClass();
            $user->sexe = $this->input->post('sexe');
            $user->login = $this->input->post('login');
            $user->nom = $this->input->post('nom');
            $user->prenom = $this->input->post('prenom');
            $user->mail = $this->input->post('email');
            $user->password = $this->input->post('password');
            $user->droit = 0;
            $user->idClasse = $this->input->post('classe');
            
            $this->user->add($user);
            redirect(base_url('eleves/liste'));
        }

        $this->load->view('template/header');
        $this->load->view('pages/eleves/creer', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = 0) {

        $this->user->delete($id);

        redirect('eleves/liste/');
    }

}

?>