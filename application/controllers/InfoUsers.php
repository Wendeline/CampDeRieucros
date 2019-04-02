<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InfoUsers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');   
        
        $data['titre'] = "Informations complémentaires";
        $data['soustitre'] = "Vous trouverez ici des biographies, archives, ...";
        $data['donnees'] = Information::orderby('idInfo','desc')->get();
        $this->load->view('AllInfoUsers',$data);
        
        $this->load->view('common/footer');
    }
    
    public function ajaxS($search=null) {
        if ($search!= null) {
            $sql = '%'.$search.'%';
            $donnees = Information::where('motClésInfo', 'like', $sql)->orWhere('titreInfo', 'like', $sql)->get();
        }
        else {
            $donnees = Information::orderby('idInfo','desc')->get();
        }
        $on = true;
        foreach ($donnees as $info) {
            $on = false;
            echo '<div class="row infoDIV">';
                echo '<div class="col m7 s12">';
            ?>
                    <object type="application/pdf"
                        data="http://campderieucros.siomende.fr/assets/pdf/<?php echo $info->titreInfo.'.pdf#toolbar=0'?>"
                        width="100%"
                        height="500">
                    </object>
            <?php
                echo '</div>';
                echo '<div class="col m5 s12">';
                    echo "<h3>".$info->titreInfo."</h3>";

                    $numTxt = $info->idT;
                    $objTxt = Texte::find($numTxt);
                    $txt = $objTxt->contenuT;

                    echo "<p>".$txt."</p>";
                    echo "<i>Auteur : ".$objTxt->auteurT."</i>";
                    
                    if ($this->session->admin == TRUE) {
                        echo '<br><br><a class="btn" href="'. base_url('InfoAdmin/update_info/'. $info->idInfo) .'">Modifier</a>';
                        echo '<br><br><a class="btn" href="'. base_url('InfoAdmin/delete/'. $info->idInfo) .'">Supprimer</a>';
                    }
                    
                echo '</div>';
            echo '</div>';   
        }
        if ($on) {
            echo '<h2>Aucun élément trouvé</h2>';
        }
    }

    

}
