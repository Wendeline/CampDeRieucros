        <article>
            <h2><?php echo $titre;?></h2>
            <p><?php echo $soustitre;?></p>

            <?php
                $cpt=0;
                foreach ($donnees as $photo) {
                    if ($cpt%3==0) {
                        echo "<div class='row'>";
                    }
                            echo "<div class='col s4'>";
                                ?>
                                    <div class="card small">
                                        <div class="card-image">
                                            <?php echo img('photoGallerie/'.$photo->titreIG.'.jpg', 'class="materialboxed"'); ?>
                                            <span class="card-title"><?php echo $photo->titreIG ?></span>
                                        </div>
                                        <div class="card-content">
                                            <p>
                                                <?php
                                                    $numTxt = $photo->idT;
                                                    $objTxt = Texte::find($numTxt);
                                                    echo $objTxt->contenuT;
                                                ?>
                                            </p>
                                            <span style="position: absolute;bottom: 5px;right: 10px;font-weight: 300;color: #988bf3;">
                                                <?php echo $objTxt->auteurT; ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php
                            echo "</div>";
                    $cpt++;
                    if ($cpt%3==0) {
                        echo "</div>";
                    }
                }
                if ($cpt%3!=0) {
                    echo "</div>";
                }
            ?>
        </article>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  var modal = $('#myModal')
  var span = $(".close")
  var modalImg = $("#img01")
  var captionText = $("#caption")

  var img = $('.myImg')

 img.click(function(){
      modal.css('display', 'block')
      modalImg.attr('src', this.src)
      captionText.html(this.alt)
  });

  span.click(function() {
    modal.css('display', 'none')
	});
});
</script>
