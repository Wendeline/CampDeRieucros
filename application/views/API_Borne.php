
<article>

	<h1><?php echo $borne->nomB; ?> </h1>
    <?php
        
                    $numTxt = $borne->idT;
                    if (isset($numTxt)){
                        $objTxt = Texte::find($numTxt);
                        $txt = $objTxt->contenuT;
                        echo $txt;
                        echo "<br>";
                        echo $objTxt->auteurT;
                    }
                    echo "<br>";
                    
                    $numImg = $borne->idIG;
                    if (isset($numImg)){
                        $objImg = Gallerie::find($numImg);
                        $img = $objImg->titreIG;
                        echo img('photoGallerie/'.$img.'.jpg','height="500" width="500"');
                        echo "<br>";
                        echo $objImg->droitUsage;
                    }
                    echo "<br>";
                    
                    $numInfo = $borne->idInfo;
                    if (isset($numInfo)){
                        $objInfo = Information::find($numInfo);
                        $info = $objInfo->titreInfo;
                        ?>
                        <object type="application/pdf"
                        data="http://campderieucros.siomende.fr/assets/pdf/<?php echo $info .'.pdf#toolbar=0'?>"
                        width="770"
                        height="500">
                    </object>
                        <?php
                    }
                    echo "<br>";
                    
                    if ($this->session->admin == TRUE) {
                        echo '<a class="btn" href="'.base_url('Balise/update_borne/'.$borne->idB).'">Modifier</a>';
                        echo "<br>";
                        echo "<br>";
                        echo '<a class="btn" href="'.base_url('Balise/delete/'.$borne->idB).'">Supprimer</a>';
                    }
                    echo "<br>";
    ?>
</article>