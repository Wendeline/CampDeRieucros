<article>
    <p>
        <?php
        echo form_open_multipart('Photo/Ajout');
        echo form_fieldset('Ajout d\'une photo');
            
            echo form_label('Titre','titre');
            echo form_input('titre');
            echo '<br>';
            echo form_label('Texte','txt');
            echo form_input('txt');
            echo '<br>';
            echo form_label('Auteur','autor');
            echo form_input('autor');
            echo '<br>';
            echo form_label('Droits d\'usage','Droits');
            echo form_input('Droits');
            echo '<br>';
            echo form_label('<br>L\'image<br>', 'image');
            echo '<input type="file" name="image" size="50" />';
            echo '<br>';
            
            //echo "<input type='file' name='img'/><br/>";
            ?>

            <br/><br /><?php

            echo form_submit('valid','Valider');
        echo form_fieldset_close();
        echo form_close();
        ?>
    </p>
</article>
