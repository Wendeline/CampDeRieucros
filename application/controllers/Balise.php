<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Balise extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        if ($this->session->admin != TRUE) {
            redirect('/Login');
        }
    }
    
    public function index(){
       $this->load->view('common/header');
       $this->load->view('common/nav');
       $data['titre'] = " ";
       $data['soustitre'] = " ";
       $this->load->view('Home',$data);
       $this->load->view('common/footer');
    }
    
    public function add_borne(){
       $this->load->view('common/header');
       $this->load->view('common/nav');
       $data['titre'] = " ";
       $data['soustitre'] = "Ajouter une une borne";
       $this->load->view('addBorne_form',$data);
       $this->load->view('common/footer');
    }
    
    public function update_borne($ref = null){
       $this->load->view('common/header');
       $this->load->view('common/nav');
       
       $data = array('borne' => Borne::find($ref));       
       $this->load->view('updateBorne_form',$data);
       
       $this->load->view('common/footer');
    }
        
    public function add(){
        $error = "";
        if ($_FILES['image'] != null && $_FILES['image']['error'] == 0) {
            $size = getimagesize($_FILES['image']['tmp_name']);

            if ($size[0] <= 1000 && $size[1] <= 1000) {
                $ext = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));
                var_dump($ext);
                if ($ext == 'jpg') {
                    $nom = 'assets/images/photoGallerie/' . $this->input->post('titreIG'). '.jpg';
                    $resultat = move_uploaded_file($_FILES['image']['tmp_name'],  $nom);
                    if (!$resultat) {
                        $error = "Le fichier n'as pas pu etre deplacer dans le dossier";
                    }
                }
                else {
                    $error = "Fichier a une extention invalide (.jpg uniquement)";
                }
            }
            else {
                $error = "Fichier est supérieur a : 1000x1000px";
            }
        }
        else {
            $error = "Fichier non envoyer ou erreur inconnu";
        }
        
        $error2 = "";
        if ($_FILES['userfile'] != null && $_FILES['userfile']['error'] == 0) {
            $size = $_FILES['userfile']['size'];

            if ($size <= 2097152) {
                $ext = strtolower(substr(strrchr($_FILES['userfile']['name'], '.'),1));
                var_dump($ext);
                if ($ext == 'pdf') {
                    $nom = 'assets/pdf/'.$this->input->post('titreInfo').'.pdf';
                    $resultat = move_uploaded_file($_FILES['userfile']['tmp_name'],$nom);
                    if (!$resultat) {
                        $error2 = "Le fichier n'as pas pu etre deplacer dans le dossier";
                    }
                }
                else {
                    $error2 = "Fichier a une extention invalide (.pdf uniquement)";
                }
            }
            else {
                $error2 = "Fichier est supérieur a : 500ko";
            }
        }
        else {
            $error2 = "Fichier non envoyer ou erreur inconnu";
        }
        
        if ($error === "" && $error2 === "") {
            $addTexte = new Texte();
                $addTexte->contenuT = $this->input->post('txt');
                $addTexte->auteurT = $this->input->post('aut');
                $addTexte->save();
                $idTxt = $addTexte->idT;
                
            $addImg = new Gallerie();
                $addImg->titreIG = $this->input->post('titreIG');
                $addImg->droitUsage = $this->input->post('droits');
                $addImg->save();
                $idImg = $addImg->idImg;

            $addInfo = new Information();
                $addInfo->titreInfo = $this->input->post('titreInfo');
                $addInfo->motClésInfo = $this->input->post('motsCle');
                $addInfo->save();
                $idInfo = $addInfo->idInfo;

                $addBorne = new Borne();
                $addBorne->nomB      = $this->input->post('nom');
                $addBorne->LONG      = $this->input->post('long');            
                $addBorne->LAG       = $this->input->post('lat');
                $addBorne->idT       = $idTxt;
                $addBorne->idIG      = $idImg;
                $addBorne->idInfo    = $idInfo;
                $addBorne->save();

            redirect('Acceuil');
        }else{
            redirect('add_borne/');
        }
    }
    
    public function update($ref = null){
      var_dump($_POST);
      if ($ref == null ) redirect('/Acceuil');
            
            //verif zéro erreur photo
      
      $error = "";
      if ($_FILES['image'] != null && $_FILES['image']['error'] == 0) {
          $size = getimagesize($_FILES['image']['tmp_name']);

          if ($size[0] <= 1000 && $size[1] <= 1000) {
              $ext = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));
              var_dump($ext);
              if ($ext == 'jpg') {
                  $nom = 'assets/images/photoGallerie/'.$this->input->post('titreIG').'.jpg';
                  $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
                  if (!$resultat) {
                      $error = "Le fichier n'as pas pu etre deplacer dans le dossier";
                  }
              }
              else {
                  $error = "Fichier a une extention invalide (.jpg uniquement)";
              }
          }
          else {
              $error = "Fichier est supérieur a : 200x200px";
          }
      }

      //verif zéro erreur pdf
      
      $error2 = "";
        if ($_FILES['userfile'] != null && $_FILES['userfile']['error'] == 0) {
            $size = $_FILES['userfile']['size'];

            if ($size <= 2097152) {
                $ext = strtolower(substr(strrchr($_FILES['userfile']['name'], '.'),1));
                var_dump($ext);
                if ($ext == 'pdf') {
                    $nom = 'assets/pdf/'.$this->input->post('titreInfo').'.pdf';
                    $resultat = move_uploaded_file($_FILES['userfile']['tmp_name'],$nom);
                    if (!$resultat) {
                        $error2 = "Le fichier n'as pas pu etre deplacer dans le dossier";
                    }
                }
                else {
                    $error2 = "Fichier a une extention invalide (.pdf uniquement)";
                }
            }
            else {
                $error2 = "Fichier est supérieur a : 500ko";
            }
        }
        
        $borne = Borne::find($ref);
      if ($error === "" && $error2 === "" && $borne != null) {
          
            $modBorne = Borne::find($ref);
            $borneID = $modBorne->idB;
            $long  = $this->input->post('long');
            $lat  = $this->input->post('lat');
            $nomB  = $this->input->post('nom');
			try {
            Borne::where(
                'idB',$borneID
                )->update(['LONG'=> $long,
                           'LAG' => $lat,
                            'nomB'=>$nomB]);

            Texte::where('idT', $modBorne->idT)
                      ->update(['contenuT' => $this->input->post('txt'),
                                'auteurT' => $this->input->post('aut')]);
            
            Gallerie::where('idIG',$modBorne->idIG)
                    ->update(['titreIG'=>$this->input->post('titreIG'),
                              'droitUsage'=>$this->input->post('droits')]);
            
            Information::where('idInfo',$modBorne->idInfo)
                    ->update(['titreInfo'=>$this->input->post('titreInfo'),
                              'motClésInfo'=>$this->input->post('motsCle')]);
			 redirect('Acceuil');
			 
			 } catch (Exception $e) {
				echo $e;
			}
    }
      else{

          redirect('Balise/update_borne/'.$ref);
      }
    }
    
    public function delete($borne = null)
    {
      if ($borne == null ) redirect('Balise');
      Borne::find($borne)->delete();
      redirect('Balise');
    }
}