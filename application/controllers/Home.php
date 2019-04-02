<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->admin != TRUE) {
            redirect('/Login');
        }
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');  
        
        $data['titre'] = "Camp de Rieucros";
        $data['soustitre'] = "Bienvenue au panel d'administration";
        $this->load->view('AcceuilAdmin',$data);
        
        $this->load->view('common/footer');
    }

    public function aSupp()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        $this->load->view('common/footer');
    }

}
