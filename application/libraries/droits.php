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
            "eleves" => Array('modifier')
        )
    );

    public function Droits(){
        $CI =& get_instance();
        
        //Aller chercher les vrais droits pour la config
        $droit = 0;
        
        
        $url = $_SERVER['REDIRECT_QUERY_STRING'];
        $url = explode('/',$url);
        array_shift($url);
        if(sizeof($url) == 1){
            //Cela veut dire que l'on appel l'index
            array_push($url, "index");
        }
        
        if(isset($this->droits[$droit]["$url[0]"])){
            if(in_array($url[1],$this->droits[$droit]["$url[0]"])){
                //On a pas les droits pour y accéder
                //redirect('accueil')
            }
        }
    }

}

