<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Droits extends CI_Form_validation {
    
    //Variable qui défini la ou les utilisateurs n'ont pas le droit d'aller
    //0 => éléves
    //1 => professeurs    
    private $droits = Array(
        0 => Array(
        "eleves" => Array('delete','liste'),
        "examens" => Array('index','creer','programmer'),
        "professeurs" => Array('delete','creer','liste')
        ),
        1 => Array(
            "eleves" => Array('modifier'),
            "examens" => Array('correction')
        )
    );

    public function Droits(){
        $CI =& get_instance();
        
        //Aller chercher les vrais droits pour la config  
        $user = $CI->session->userdata('user');
        //$CI->session->unset_userdata('user');
        $request_url = explode('/',$_SERVER['REQUEST_URI']);
        
        if(!$user && !in_array('connexion',$request_url)){
            redirect(base_url('connexion'));
        }else if(!in_array('connexion',$request_url)){
            $url = $_SERVER['REDIRECT_QUERY_STRING'];
            $url = explode('/',$url);
            array_shift($url);
            if(sizeof($url) == 1){
                //Cela veut dire que l'on appel l'index
                array_push($url, "index");
            }
            $droit = $user->droit;
            if(isset($this->droits[$droit]["$url[0]"])){
                if(in_array($url[1],$this->droits[$droit]["$url[0]"])){
                    //On a pas les droits pour y accéder
                    redirect('connexion');
                }
            }
        }
    }

}

