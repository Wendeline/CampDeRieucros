<article>
    <p>
        <?php
        echo form_open('InfoAdmin/update/'.$info->idInfo, ' enctype="multipart/form-data"');
        echo form_fieldset('Modifier l\'information');
            echo form_label('Numero','ref');
            echo form_input('ref', $info->idInfo, "disabled");
            echo '<br>';
        
            echo form_label('Titre : ','titre');
            echo form_input('titre',$info->titreInfo);
            echo '<br>';
            echo form_label('Mots clés : ','motsCle');
            echo form_input('motsCle',$info->motClésInfo);
            echo "<br>";
            
            $numTxt = $info->idT;
            $objTxt = Texte::find($numTxt);
            $txt = $objTxt->contenuT;
            
            echo form_label('Texte:','txt');
            echo form_input('txt', $txt);
            echo '<br>';
            echo form_label('Auteur:','aut');
            echo form_input('aut',$objTxt->auteurT);
            echo '<br>';
           
            echo form_label('<br>Le document pdf :<br>', 'fichier');
            echo '<input type="file" name="userfile" size="500" />';
            echo '<br>';
             echo form_submit('modifier','Modifier');
        echo form_fieldset_close();
        echo form_close();                
        ?>
    </p>
</article>