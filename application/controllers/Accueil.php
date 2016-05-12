<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller { 

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
            $user = $this->session->userdata('user');
            var_dump($user);
            if($user->droit == 0){
                //c'est un étudiant
                $this->accueilEtudiant();
            }else if($user->droit == 1){
                //c'est un prof
                $this->accueilProf();
            }else{
                die('WTF !');
            }
        }
        
        public function accueilEtudiant(){
            $data['user'] = $this->session->userdata('user');
            
            $this->load->view('template/header');
            $this->load->view('pages/accueil/etudiant', $data);
            $this->load->view('template/footer');
        }
        
        public function accueilProf(){
            $data['user'] = $this->session->userdata('user');
            
            $this->load->view('template/header');
            $this->load->view('pages/accueil/prof', $data);
            $this->load->view('template/footer');
        }
}
