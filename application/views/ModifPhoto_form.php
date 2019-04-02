<article>
    <p>
        <?php
        echo form_open_multipart('Photo/Modif/'.$photo->idIG);
        echo form_fieldset('Modifier une photo');
            echo form_label('Numero','ref');
            echo form_input('ref', $photo->idIG, "disabled");
            echo '<br>';
            echo form_label('Titre','titre');
            echo form_input('titre', $photo->titreIG);
            echo '<br>';
            
            $numTxt = $photo->idT;
            $objTxt = Texte::find($numTxt);
            $txt = $objTxt->contenuT;
            
            echo form_label('Texte','txt');
            echo form_input('txt', $txt);
            echo '<br>';
            
            echo form_label('Auteur','autor');
            echo form_input('autor', $objTxt->auteurT);
            echo '<br>';
            
            echo form_label('Droits d\'usage','Droits');
            echo form_input('Droits', $photo->droitUsage);
            echo '<br>';
            echo '<br>';
            
            echo form_label('<br>L\'image<br>', 'image');
            echo '<input type="file" name="image" size="50" />';
            echo '<br>';
            echo img('photoGallerie/'.$photo->titreIG,'height="150" width="150"');

            ?>


            <br/><br /><?php

            echo form_submit('valid','Valider');
        echo form_fieldset_close();
        echo form_close();
        ?>
    </p>
</article>
