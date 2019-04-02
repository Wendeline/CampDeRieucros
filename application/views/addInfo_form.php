<article>
    <p>
        <?php
        echo form_open_multipart('InfoAdmin/add');
        echo form_fieldset('Saisir une nouvelle information');
            echo form_label('Titre : ','titre');
            echo form_input('titre');
            echo '<br>';
            echo form_label('Mots clés : ','motsCle');
            echo form_input('motsCle');
            echo "<br>";
            echo form_label('Texte:','txt');
            echo form_input('txt');
            echo '<br>';
            echo form_label('Auteur:','aut');
            echo form_input('aut');
            echo '<br>';
            echo form_label('<br>Le document pdf :<br>', 'fichier');
            echo '<input type="file" name="userfile" size="500" />';
            echo '<br>';
            echo form_submit('ajouter','Ajouter');
        echo form_fieldset_close();
        echo form_close();                
        ?>
    </p>
</article>
