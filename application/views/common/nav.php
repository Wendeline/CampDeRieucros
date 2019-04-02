<?php if ($this->session->admin == TRUE) { ?>

    <ul id="dropdown1" class="dropdown-content">
        <li><a href="<?php echo base_url('Photo');?>">Galerie</a></li>
        <li><a href="<?php echo base_url('photo/AjoutPhoto');?>">Ajouter une photo</a></li>
    </ul>

    <ul id="dropdown2" class="dropdown-content">
        <li><a href="<?php echo base_url('Acceuil')?>">Toutes les bornes</a></li>
        <li><a href="<?php echo base_url('Balise/add_borne')?>">Ajouter une borne</a></li>
    </ul>

    <ul id="dropdown3" class="dropdown-content">
        <li><a href="<?php echo base_url('InfoAdmin')?>">Toutes les informations</a></li>
        <li><a href="<?php echo base_url('InfoAdmin/add_info')?>">Ajouter une information</a></li>
    </ul>

    <nav>
        <div class="nav-wrapper container">
            <a href="<?php echo base_url('Acceuil') ?>" class="brand-logo">Camp De Rieucros</a>

            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                        Gestion de la Galerie <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown2">
                        Gestion des bornes <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown3">
                        Gestion des informations <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('login/disconnect') ?>">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

<?php } else { ?>

    <nav>
        <div class="nav-wrapper container">
            <a href="<?php echo base_url('Acceuil') ?>" class="brand-logo">Camp De Rieucros</a>

            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="sidenav" id="mobile-demo">
			    <li><a href="<?php echo base_url('Acceuil') ?>">Accueil</a></li>
			    <li><a href="<?php echo base_url('Galerie') ?>">Galerie</a></li>
			    <li><a href="<?php echo base_url('InfoUsers') ?>">Information</a></li>
			    <li> <a href="http://www.camp-rieucros.com/" target="_blank">Camp de Rieucros</a></li>
			    <li><a href="<?php echo base_url('login/disconnect') ?>">Connexion</a></li>
			</ul>
			
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="<?php echo base_url('Acceuil') ?>">Accueil</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Galerie') ?>">Galerie</a>
                </li>
                <li>
                    <a href="<?php echo base_url('InfoUsers') ?>">Information</a>
                </li>
                <li>
                    <a href="http://www.camp-rieucros.com/" target="_blank">Camp de Rieucros</a>
                </li>
                <li>
                    <a href="<?php echo base_url('login/disconnect') ?>">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>

<?php } ?>


<div class="container" style="min-height: -webkit-fill-available;">
