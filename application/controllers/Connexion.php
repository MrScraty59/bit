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
	}

?>