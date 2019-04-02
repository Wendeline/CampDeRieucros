<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InfoAdmin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->admin != TRUE){
            redirect('/Login');
        }
    }
    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');   
        
        $data['titre'] = "Informations complémentaires";
        $data['soustitre'] = "Vous trouverez ici des biographies, archives, ...";
        $data['donnees'] = Information::orderby('idInfo','desc')->get();
        $this->load->view('AllInfoAdmin',$data);
        
        $this->load->view('common/footer');
    }
    
    public function add_info(){
       $this->load->view('common/header');
       $this->load->view('common/nav');
       $data['titre'] = " ";
       $data['soustitre'] = "Ajouter des informations";
       $this->load->view('addInfo_form',$data);
       $this->load->view('common/footer');
    }
    
    public function update_info($ref = null){
        if ($ref == null ) redirect('/InfoAdmin');
       $this->load->view('common/header');
       $this->load->view('common/nav');
       
       $data = array('info' => Information::find($ref));
       $this->load->view('updateInfo_form',$data);
       
       $this->load->view('common/footer');
    }
    
    public function delete_info(){
       $this->load->view('common/header');
       $this->load->view('common/nav');
       $data['titre'] = " ";
       $data['soustitre'] = "Supprimer les informations";
       $this->load->view('AllInfoAdmin',$data);
       $this->load->view('common/footer');
    }
    
        public function add(){
        $error = "";
        if ($_FILES['userfile'] != null && $_FILES['userfile']['error'] == 0) {
            $size = $_FILES['userfile']['size'];

            if ($size <= 2097152) {
                $ext = strtolower(substr(strrchr($_FILES['userfile']['name'], '.'),1));
                var_dump($ext);
                if ($ext == 'pdf') {
                    $nom = 'assets/pdf/'.$this->input->post('titre').'.pdf';
                    $resultat = move_uploaded_file($_FILES['userfile']['tmp_name'],$nom);
                    if (!$resultat) {
                        $error = "Le fichier n'as pas pu etre deplacer dans le dossier";
                    }
                }
                else {
                    $error = "Fichier a une extention invalide (.pdf uniquement)";
                }
            }
            else {
                $error = "Fichier est supérieur a : 500ko";
            }
        }
        else {
            $error = "Fichier non envoyer ou erreur inconnu";
        }

        if ($error === "") {

        $addTexte = new Texte();
            $addTexte->contenuT = $this->input->post('txt');
            $addTexte->auteurT = $this->input->post('aut');
            $addTexte->save();
            
            $idTxt = $addTexte->idT;
            
            $addInfo = new Information();
            $addInfo->titreInfo = $this->input->post('titre');
            $addInfo->motClésInfo = $this->input->post('motsCle');
            $addInfo->idT       = $idTxt;
            $addInfo->save();
        redirect('Home');
        }
        else
        {
            $this->load->view('common/header.php');
            $this->load->view('common/nav');

            echo '<h1 style="color:black;">Echec lors de l\'ajout du pdf</h1>';
            echo '<p style="color:black;">'. $error .'</p>';
            $this->load->view('addInfo_form');

            $this->load->view('common/footer');
        }
    }
    
     public function update($ref = null){
        if ($ref == null ){
        	redirect('/InfoAdmin');
        }
        
        $info = Information::find($ref);
        
        $error = "";
        
        var_dump($_POST);
        var_dump($_FILES);

        if ($_FILES['userfile'] != null && $_FILES['userfile']['error'] == 0) {
            $size = $_FILES['userfile']['size'];

            if ($size <= 2097152) {
                $ext = strtolower(substr(strrchr($_FILES['userfile']['name'], '.'),1));
                var_dump($ext);
                if ($ext == 'pdf') {
                    $nom = 'assets/pdf/'.$this->input->post('titre').'.pdf';
                    $resultat = move_uploaded_file($_FILES['userfile']['tmp_name'],$nom);
                    if (!$resultat) {
                        $error = "Le fichier n'as pas pu etre deplacer dans le dossier";
                    }
                }
                else {
                    $error = "Fichier a une extention invalide (.pdf uniquement)";
                }
            }
            else {
                $error = "Fichier est supérieur a : 500ko";
            }
        }
        else {
            $error = "Fichier non envoyer ou erreur inconnu";
        }

        if ($error === "") {
               
	        $info = Information::find($ref);
	         
	        Texte::where('idT', $info->idT)
	                  ->update(['contenuT' => $this->input->post('txt'),
	                            'auteurT' => $this->input->post('aut')]);
	          Information::where('idInfo', $ref )
	                      ->update([  'titreInfo'   => $this->input->post('titre'),
	                              'motClésInfo' => $this->input->post('motsCle')]);
	        redirect('InfoAdmin');
          
        }else{
            $this->load->view('common/header.php');
            $this->load->view('common/nav');

            echo '<h1 style="color:black;">Echec lors de l\'ajout du pdf</h1>';
            echo '<p style="color:black;">'. $error .'</p>';
            $this->load->view('addInfo_form');

            $this->load->view('common/footer');
        }
    }
    
     public function Delete($ref = null)
    {
      if ($ref == null ) redirect('/InfoAdmin');
      Information::find($ref)->delete();
      redirect('/InfoAdmin');
  }
}