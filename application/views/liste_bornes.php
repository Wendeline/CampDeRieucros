        <article>
            <h2><?php echo $titre;?></h2>
            <p><?php echo $soustitre;?></p>
            <p>
            <table class="case_orange">
            <?php
                $cpt=0;
                echo "<tr>";
                foreach ($donnees as $bornes){
                    echo "<td width='30%'>";
                    echo $bornes->idB;
                    echo "<br>";
                    echo $bornes->LONG;
                    echo "<br>";
                    echo $bornes->LAG;
                    echo "<br>";
                    echo $bornes->idT;
                    echo "<br>";
                    echo '<a class="btn" href="'.base_url('Balise/delete/'.$bornes->idB).'">Supprimer</a>';
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
