<article>
    <h1 style="color:black;">Suppresion</h1>
    <?php   echo img('prod/'.$produit->refProd.'.jpg','height="150" width="150" style="display:inline"'); ?>
    <p>Etes vous sur de vouloir supprimer ce produit : <strong><?php echo $produit->refProd ?></strong></p>
    <br>
    <a class="btn" href="<?php echo base_url('Prod/Enleve/'. $produit->refProd) ?>">Oui</a>
    <a class="btn" href="<?php echo base_url('Home') ?>">Non</a>
    <br>
    <br>
</article>
