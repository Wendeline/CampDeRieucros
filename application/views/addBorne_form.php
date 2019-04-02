<article>
    <h2><?php echo $titre;?></h2>
    <p><?php echo $soustitre;?></p>
    <p>
        <?php
        echo form_open('Balise/add');
        echo form_fieldset('Saisir une nouvelle borne');
            echo form_label('Nom : ','nom');
            echo form_input('nom');
            echo '<br>';
            echo form_label('Latitude : ','lat');
            echo form_input('lat');
            echo '<br>';
            echo form_label('Longitude : ','long');
            echo form_input('long');
            echo '<br>';
            
            echo form_label('Texte : ','txt');
            echo form_input('txt');
            echo '<br>';
            echo form_label('Auteur : ','aut');
            echo form_input('aut');
            echo "<br>";
            
            echo form_label('Titre image : ','titreIG');
            echo form_input('titreIG');
            echo "<br>";
            echo form_label('Droit d\'usage : ','droits');
            echo form_input('droits');
            echo "<br>";
            echo form_label('<br>L\'image<br>', 'image');
            echo '<input type="file" name="image" size="50" />';
                        
            echo "<br>";
            echo form_label('Titre pdf : ','titreInfo');
            echo form_input('titreInfo');
            echo "<br>";
             echo form_label('Mots clés : ','motsCle');
            echo form_input('motsCle');
            echo "<br>";
            echo form_label('<br>Le document pdf :<br>', 'fichier');
            echo '<input type="file" name="userfile" size="500" />';
            echo '<br>';
            echo form_submit('valider','Valider');
        echo form_fieldset_close();
        echo form_close();                
        ?>
    </p>
</article>
