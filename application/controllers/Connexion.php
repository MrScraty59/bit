<?php

	class Connexion extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			echo 'Hello World!';

			$data = array();
			$data['pseudo'] = 'Arthur';
			$data['email'] = 'email@ndd.fr';
			$data['en_ligne'] = true;

			$this->load->view('template/header');
            $this->load->view('pages/connexion/connexion', $data);
            $this->load->view('template/footer');

		}

		public function connexion(){

			if(isset($this->input->post('firstname'))){
				// Inscription

				$email = $this->input->post('azddaz');
				$firstname = $this->input->post('azddaz');
				$lastname = $this->input->post('azddaz');
				$passwd = $this->input->post('azddaz');

			}else{

				// Connexion
				$email = $this->input->post('username');
				$pass = $this->input->post('password');
			}

			

			$user = $this->user->getUserByEmail($email);

			if(empty($user))
				$data['error'] = '<p style="color:red">L\'adresse email est incorrect</p>';
			else
				$data['error'] = '<p style="color:green">Vous avez réussi a vous connecter</p>';

			$this->load->view('template/header');
            $this->load->view('pages/connexion/login', $data);
            $this->load->view('template/footer');

		}

	}

?>