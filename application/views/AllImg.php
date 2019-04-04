        <article>
            <h2><?php echo $titre;?></h2>
            <p><?php echo $soustitre;?></p>
            <p>
            <table class="case_orange">
            <?php
                $cpt=0;
                echo "<tr>";
                foreach ($donnees as $photo) {
                    echo '<td width="30%" id="'. $photo->idIG .'">';
                    echo img('photoGallerie/'.$photo->titreIG.'.jpg','height="150" width="150"');
                    echo "<br>";
                    
                    if isset($photo->idT){
                    	$numTxt = $photo->idT;
	                    $objTxt = Texte::find($numTxt);
	                    $txt = $objTxt->contenuT;
                    }else{
                    	$objTxt ="";
                    	$txt = "";
                    }
                                 
                      echo "<b>".$txt."</b>";
                    echo "<br>";
                    echo "<b>".$objTxt->auteurT."</b>";
                    echo "<br>";
                        echo '<a class="btn" href="'. base_url('Photo/Update/'. $photo->idIG) .'">Modifier</a>';
                    echo "<br>";
                    echo "<br>";
                          echo '<a class="btn" href="'. base_url('Photo/Delete/'. $photo->idIG) .'">Supprimer</a>';
                          echo "<br>";
                          echo "<br>";
                    echo "</td>";
                    $cpt++;
                    if ($cpt%3==0) {
                        echo "</tr><tr>";
                    }
                }
                echo "</tr>";
            ?>
            </table>
            </p>
        </article>
