<article>
    <p>
        <?php
        echo form_open('Balise/update/'.$borne->idB, 'enctype="multipart/form-data"');
        echo form_fieldset('Modifier une borne');
            echo form_label('Numéro: ','id');
            echo form_input('id',$borne->idB,"disabled");
            echo '<br>';
            echo form_label('Nom : ','nom');
            echo form_input('nom',$borne->nomB);
            echo '<br>';
            echo form_label('Latitude : ','lat');
            echo form_input('lat',$borne->LAG);
            echo '<br>';
            echo form_label('Longitude : ','long');
            echo form_input('long',$borne->LONG);
            echo '<br>';

            $numTxt = $borne->idT;
            if(isset($numTxt)){

            	$objTxt = Texte::find($numTxt);
	            echo form_label('Texte : ','txt');
	            echo form_input('txt',$objTxt->contenuT);
	            echo '<br>';
	            echo form_label('Auteur : ','aut');
	            echo form_input('aut',$objTxt->auteurT);
	            echo "<br>";
        	}else{

        		echo form_label('Texte : ','txt');
	            echo form_input('txt');
	            echo '<br>';
	            echo form_label('Auteur : ','aut');
	            echo form_input('aut');
	            echo "<br>";
        	}
            
            
            $numImg = $borne->idIG;
            if (isset($numImg)){
            	$objImg = Gallerie::find($numImg);
	            echo form_label('Titre image : ','titreIG');
	            echo form_input('titreIG',$objImg->titreIG);
	            echo "<br>";
	            echo form_label('Droit d\'usage : ','droits');
	            echo form_input('droits',$objImg->droitUsage);
	            echo "<br>";
	            echo form_label('<br>L\'image<br>', 'image');
	            echo '<input type="file" name="image" size="50" />';
	            echo '<br>';
	            echo img('photoGallerie/'.$objImg->titreIG,'height="150" width="150"');
            }else{
            	 echo form_label('Titre image : ','titreIG');
		            echo form_input('titreIG');
		            echo "<br>";
		            echo form_label('Droit d\'usage : ','droits');
		            echo form_input('droits');
		            echo "<br>";
		            echo form_label('<br>L\'image<br>', 'image');
		            echo '<input type="file" name="image" size="50" />';
		            echo '<br>';
            }
                      
            echo "<br>";
            $numInfo = $borne->idInfo;
            if (isset($numInfo)){
            	$objInfo = Information::find($numInfo);
                $info = $objInfo->titreInfo;
	            echo form_label('Titre pdf : ','titreInfo');
	            echo form_input('titreInfo',$objInfo->titreInfo);
	            echo "<br>";
	            echo form_label('Mots clés : ','motsCle');
	            echo form_input('motsCle',$objInfo->motClésInfo);
	            echo "<br>";
	            echo form_label('<br>Le document pdf :<br>', 'fichier');
	            echo '<input type="file" name="userfile" size="500" />';
	            echo '<br>';
	            ?><object type="application/pdf"
	                        data="http://campderieucros.siomende.fr/assets/pdf/<?php echo $info.'.pdf#toolbar=0'?>"
	                        width="770"
	                        height="500">
	                    </object>
	             <?php   
            }else{
	            echo form_label('Titre pdf : ','titreInfo');
	            echo form_input('titreInfo');
	            echo "<br>";
	            echo form_label('Mots clés : ','motsCle');
	            echo form_input('motsCle');
	            echo "<br>";
	            echo form_label('<br>Le document pdf :<br>', 'fichier');
	            echo '<input type="file" name="userfile" size="500" />';
	          }  
            echo "<br><br>";
            echo form_submit('modifier','Modifier');
        echo form_fieldset_close();
        echo form_close();                
        ?>
    </p>
</article>