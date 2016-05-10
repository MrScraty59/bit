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

			$data = array();

			if(!empty($this->input->post('firstname'))){
				// Inscription

				$user = new stdClass();

				$user->login = $this->input->post('login');
				$user->mail = $this->input->post('email');
				$user->sexe = 'M';
				$user->nom = $this->input->post('firstname');
				$user->prenom = $this->input->post('lastname');
				$user->password = $this->input->post('passwd');
				$user->idClasse = 2;
				$user->droit = 1;

				$data['inscription'] = $this->user->add($user);


			}else{

				// Connexion
				$email = $this->input->post('username');
				$pass = $this->input->post('password');
			}

			if(!empty($email)){

				$user = $this->user->getUserByEmail($email);

				if(empty($user))
					$data['error'] = '<p style="color:red">L\'adresse email est incorrect</p>';
				else
					$data['error'] = '<p style="color:green">Vous avez réussi a vous connecter</p>';

			}

			$data['test'] = $this->user->getAll();


			$this->load->view('template/header');
            $this->load->view('pages/connexion/login', $data);
            $this->load->view('template/footer');

		}

	}

?>