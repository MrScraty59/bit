<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examens extends CI_Controller {

	public function creer($idMatiere = 0)
	{
            if($idMatiere == 0){
                redirect('/accueil');
            }
	}
}
