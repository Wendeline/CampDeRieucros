<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->admin == TRUE) {
            redirect('Home');
        }
        else {
            $this->load->view('common/header');
            $this->load->view('common/nav');
                $data['titre']     = "Identification";
                $data['soustitre'] = "Pour accéder au site, merci de saisir vos identifiants";
                $this->load->view('login_form',$data);
            $this->load->view('common/footer.php');
        }

    }

    public function check_admin()
    {
        $nbrep = Admin::where([
                        'mailAdm'   =>$this->input->post('login'),
                        'mdpAdm'  =>$this->input->post('pwd')
                    ])->count();

        if ($nbrep==1) {
            //enregistrement des données de session
            $sessiondata = array('admin'=> TRUE);
            $this->session->set_userdata($sessiondata);
            redirect('Home');
        }
        else {
            $this->load->view('common/header');
            $this->load->view('common/nav');

            $data['titre'] = "Identification";
            $data['soustitre'] = "Vérifiez vos identifiants d'administration et recommencez !";
            $this->load->view('login_form',$data);

            $this->load->view('common/footer');
        }
    }

    public function disconnect()
    {
        $sessiondata = array(
                   'admin'=> FALSE
               );
            $this->session->set_userdata($sessiondata);

        $this->session->set_userdata("");
        redirect('Login');
    }
}
