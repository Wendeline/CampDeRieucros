<div class="row">
    <div class="row">
        <h2><?php echo $titre;?></h2>
        <p><?php echo $soustitre;?></p>
        
        <div class="input-field col s6">
            <input placeholder="Exp: Camp, quotidien, enfant..." id="search" type="text" oninput="Search(this.value)" class="validate">
            <label for="search">Recherche par mots clés</label>
        </div>
    </div>         
    
    
    
    <article id="replaceBySearch">
        <?php
            foreach ($donnees as $info) {
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

                        if (isset($info->idT)){
                            $numTxt = $info->idT;
                            $objTxt = Texte::find($numTxt);
                            $txt = $objTxt->contenuT;
                        }else{
                            $objTxt = "";
                            $txt ="";
                        }
                        

                        echo "<p>".$txt."</p>";
                        echo "<i>Auteur : ".$objTxt->auteurT."</i>";
                    echo '</div>';
                echo '</div>';   
            }
        ?>
    </article>
</div>



   
                 <?php /*
                <embed src=<?php// "../assets/doc/".$info->titreInfo.".pdf" ?>. width="750" height="300" type='application/pdf'></embed>
                 
                  <div id="fich1"> 
                    <object data=<?php// "../assets/pdf/'$info->titreInfo'.pdf" ?> type="text/html" codetype="application/pdf" ></object> 
                    </div> */ 
                 
                  /*echo '<td width="30%" id="'. $info->idInfo .'">';
                    echo img($info->titreInfo.'.pdf');
                    echo "<br>";
                    */?>
                  