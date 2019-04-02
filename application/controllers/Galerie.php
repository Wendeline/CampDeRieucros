<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerie extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        
        $data['titre'] = "Galerie photo";
        $data['soustitre'] = "Toutes les photos actuellement présentes dans la galerie";
        $data['donnees'] = Gallerie::orderby('idIG','desc')->get();
        $this->load->view('ImgUsers',$data);

        
        $this->load->view('common/footer');
    }

}
