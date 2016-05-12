<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller { 

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        
        public function index(){
            $this->form_validation->set_rules('login', 'Identifiant', 'trim|xss_clean|encode_php_tags|required');
            $this->form_validation->set_rules('password', 'Mot de passe', 'trim|xss_clean|encode_php_tags|required');
            
            if($this->input->post() && $this->form_validation->run()){
                $login = $this->input->post('login');
                $password = $this->input->post('password');
                
                $user = $this->user->getFromLogin($login);
                if($user){
                    $user = $user[0];
                    if($user->password == $password){
                        $this->session->unset_userdata('user');
                        $this->session->set_userdata('user',$user);
                        //redirect('accueil');
                    }
                }
            }
            $this->load->view('template/header');
            $this->load->view('pages/connexion/login');
        }
}
