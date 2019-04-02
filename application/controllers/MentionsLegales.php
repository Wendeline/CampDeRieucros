<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MentionsLegales extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');
        
        $data['titre'] = "Mentions Légales";
        $data['soustitre'] = "Merci de bien vouloir prendre en compte les mentions ci-dessous.";
        $this->load->view('MentionLegal',$data);

        $this->load->view('common/footer');
    }

}
