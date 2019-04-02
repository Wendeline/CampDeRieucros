<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SelectBorne extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($ref=null)
    {
        if ($ref == null ) redirect('/Acceuil');
        
        $this->load->view('common/header');
        $this->load->view('common/nav'); 
        
        $data = array('borne' => Borne::find($ref));
        $this->load->view('API_Borne',$data);
        
        $this->load->view('common/footer');
    }

    

}
