<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller {

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
        
        $data['titre'] = "Galerie photo";
        $data['soustitre'] = "Toutes les photos actuellement présentes dans la galerie";
        $data['donnees'] = Gallerie::orderby('idIG','desc')->get();
        $this->load->view('AllImg',$data);

        
        $this->load->view('common/footer');
    }

    public function AjoutPhoto()
    {
        $this->load->view('common/header.php');
        $this->load->view('common/nav');
        $this->load->view('AjoutPhoto_form');
        $this->load->view('common/footer');
    }
    
    public function Ajout()
    {
         $error = "";
        if ($_FILES['image'] != null && $_FILES['image']['error'] == 0) {
            $size = getimagesize($_FILES['image']['tmp_name']);

            if ($size[0] <= 1000 && $size[1] <= 1000) {
                $ext = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));
                var_dump($ext);
                if ($ext == 'jpg') {
                    $nom = 'assets/images/photoGallerie/' . $this->input->post('titre'). '.jpg';
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

        if ($error === "") {
                       
            $addTexte = new Texte();
            $addTexte->contenuT = $this->input->post('txt');
            $addTexte->auteurT = $this->input->post('autor');
            $addTexte->save();
            
            $idTxt = $addTexte->idT;
            
            $addPhoto = new Gallerie();
            $addPhoto->titreIG       = $this->input->post('titre');            
            $addPhoto->idT       = $idTxt;
            $addPhoto->droitUsage = $this->input->post('Droits');
            $addPhoto->save();

            redirect('Photo');
        }
        else
        {
            $this->load->view('common/header.php');
            $this->load->view('common/nav');

            echo '<h1 style="color:black;">Echec lors de l\'ajout de la photo</h1>';
            echo '<p style="color:black;">'. $error .'</p>';
            $this->load->view('AjoutPhoto_form');

            $this->load->view('common/footer');
        }
    }

    public function Update($ref = null)
    {
        if ($ref == null ) redirect('/Photo');
        $this->load->view('common/header.php');
        $this->load->view('common/nav');


        $data = array('photo' => Gallerie::find($ref));
        $this->load->view('ModifPhoto_form', $data);

        $this->load->view('common/footer');
    }
    
     public function Modif($ref = null){
        if ($ref == null ) redirect('/Photo');

      $error = "";
      if ($_FILES['image'] != null && $_FILES['image']['error'] == 0) {
          $size = getimagesize($_FILES['image']['tmp_name']);

          if ($size[0] <= 1000 && $size[1] <= 1000) {
              $ext = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));
              var_dump($ext);
              if ($ext == 'jpg') {
                  $nom = 'assets/images/photoGallerie/' . $this->input->post('titre');
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
              $error = "Fichier est supérieur a : 200x200px";
          }
      }
      else {
          $error = ""; //il est posible de ne pas changer l'image donc pas d'erreur ici
      }

      $photo = Gallerie::find($ref);
      if ($error === "" && $photo != null) {
          
          Texte::where('idT', $photo->idT)
                  ->update(['contenuT' => $this->input->post('txt'),
                            'auteurT' => $this->input->post('autor')]);

          Gallerie::where('idIG', $ref )
                      ->update([  'titreIG'   => $this->input->post('titre'),
                          'droitUsage'=> $this->input->post('Droits')
                              ]);

          redirect('Photo');
      }
      else
      {
          $this->load->view('common/header.php');
          $this->load->view('common/nav');

          echo '<h1 style="color:black;">Echec lors de la modification de la photo</h1>';
          echo '<p style="color:black;">'. $error .'</p>';

          $data = array('photo' => Gallerie::find($ref));
          $this->load->view('ModifPhoto_form', $data);

          $this->load->view('common/footer');
      }
    }
    
    
    public function Delete($ref = null)
    {
      if ($ref == null ) redirect('/Photo');
      Gallerie::find($ref)->delete();
      redirect('/Photo');
    }
}
