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

                        $numTxt = $info->idT;
                        $objTxt = Texte::find($numTxt);
                        $txt = $objTxt->contenuT;

                        echo "<p>".$txt."</p>";
                        echo "<i>Auteur : ".$objTxt->auteurT."</i>";
                        echo '<br><br><a class="btn" href="'. base_url('InfoAdmin/update_info/'. $info->idInfo) .'">Modifier</a>';
                        echo '<br><br><a class="btn" href="'. base_url('InfoAdmin/delete/'. $info->idInfo) .'">Supprimer</a>';
                    echo '</div>';
                echo '</div>';   
            }
        ?>
    </article>
</div>