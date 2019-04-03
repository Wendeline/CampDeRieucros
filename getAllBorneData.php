<?php

$bornes = array();

include 'connexion.php';

$req = "Select * from bornes";
$traitement = $connect ->prepare($req);
    $traitement -> execute();

while ($row = $traitement->fetch()){    
    if (isset($row['idT'])){
        $req2 = "Select * from textes where idT = ?";
        $traitement2 = $connect -> prepare($req2);
        $traitement2 -> bindParam(1,$row['idT']);
        $traitement2 -> execute();
        $txt = $traitement2->fetch();
    }else{
        $txt = "";
    }
    if (isset($row['idIG'])){
        $req3 = "Select * from galleries where idIG = ?";
        $traitement3 = $connect -> prepare($req3);
        $traitement3 -> bindParam(1,$row['idIG']);
        $traitement3 -> execute();
        $img = $traitement3 ->fetch();
    }else{
        $img = "";
    }
    if (isset($row['idInfo'])){
        $req4 = "Select * from information where idInfo =?";
        $traitement4 = $connect->prepare($req4);
        $traitement4 -> bindParam(1,$row['idInfo']);
        $traitement4 -> execute();
        $info = $traitement4->fetch();
    }else{
        $info = "";
    }
    
    if($txt != "" && $img != "" && $info != ""){ //on récup tout
        $texte = $txt['contenuT'];
        //recupérer l'image
        $LienImg = "http://campderieucros.siomende.fr/assets/images/photoGallerie/".$img['titreIG'].".jpg";
        //récupérer le pdf
        $Lienpdf = "http://campderieucros.siomende.fr/assets/pdf/".$info['titreInfo'].".pdf";
       
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte ,$LienImg, $Lienpdf);
    }
    else if($txt == "" && $img != "" && $info != ""){ //on récup tout sauf le texte
        //recupérer l'image
        $LienImg = "http://campderieucros.siomende.fr/assets/images/photoGallerie/".$img['titreIG'].".jpg";
        //récupérer le pdf
        $Lienpdf = "http://campderieucros.siomende.fr/assets/pdf/".$info['titreInfo'].".pdf";
        $texte ="";
        
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte ,$LienImg, $Lienpdf);
    }
    else if ($txt != "" && $img == "" && $info != ""){ //on récup tout sauf l'image
        $texte = $txt['contenuT'];
        //récupérer le pdf
        $Lienpdf = "http://campderieucros.siomende.fr/assets/pdf/".$info['titreInfo'].".pdf";
        $LienImg ="";
        
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte, $LienImg ,$Lienpdf);
    }
    else if($txt != "" && $img != "" && $info == ""){ //on récup tout sauf l'info
        $texte = $txt['contenuT'];
        //récupérer l'image
        $LienImg = "http://campderieucros.siomende.fr/assets/images/photoGallerie/".$img['titreIG'].".jpg";
        
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte ,$LienImg, $Lienpdf);
    }
    else if($txt == "" && $img == "" && $info != ""){ //on récup que l'info
        //récupérer le pdf
        $Lienpdf = "http://campderieucros.siomende.fr/assets/pdf/".$info['titreInfo'].".pdf";
        $texte = "";
        $LienImg ="";
        
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte, $LienImg ,$Lienpdf);
    }
    else if ($txt == "" && $img != "" && $info == ""){ //on récup que l'image
        //récupérer l'image
        $LienImg = "http://campderieucros.siomende.fr/assets/images/photoGallerie/".$img['titreIG'].".jpg";
        $texte="";
        $Lienpdf="";
        
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte ,$LienImg, $Lienpdf);
    }
    else if($txt != "" && $img == "" && $info == ""){ //on récup que le texte
        $texte = $txt['contenuT'];
        $LienImg = "";
        $Lienpdf ="";
        
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte , $LienImg , $Lienpdf);
    }
    else if($txt == "" && $img == "" && $info == ""){ //on récup rien
        $texte ="";
        $LienImg="";
        $Lienpdf="";
        $borne = array($row['idB'], $row['nomB'],$row['LAG'],$row['LONG'], $texte , $LienImg , $Lienpdf);
    }
        array_push($bornes,$borne);
}
echo $js  = json_encode($bornes);