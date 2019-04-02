<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acceuil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav'); 
        
        $data['titre'] = "Camp de Rieucros";
        $data['soustitre'] = "Voici la carte avec les bornes du camp";
        $this->load->view('AccueilUsers',$data);
        
        $this->load->view('common/footer');
    }

    

}
