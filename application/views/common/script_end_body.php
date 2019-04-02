<script type="text/javascript" src="<?php echo js_url('materialize.min');?>"></script>
<script type="text/javascript" src="<?php echo js_url('materialize');?>"></script>

<script type="text/javascript">
/* JS */
  // Obligatoire
    	/* Nav */
    	  $(document).ready(function(){
        	$('.sidenav').sidenav();
      	});

      	$(document).ready(function(){
        	$('.tooltipped').tooltip();
      	});
      	/* Modal */
      	$(document).ready(function(){
        	$('.modal').modal();
      	});
      	/* Form Select */
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {dropdownOptions : obj });
        });
        /* Character count */
        $(document).ready(function() {
          $('.countChar').characterCounter();
        });
        /* Colider */
        $(document).ready(function(){
          $('.collapsible').collapsible();
        });
        /* Dropdown */
        $(document).ready(function(){
          $(".dropdown-trigger").dropdown();
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //   var elems = document.querySelectorAll('.dropdown-trigger-nav');
        //   var instances = M.Dropdown.init(elems, {  hover           : true,
        //                                             container       : 'test',
        //                                             constrainWidth  : false,
        //                                             closeOnClick    : false,
        //                                             autoTrigger     : true,
        //                                             coverTrigger    : false
        //                                           });
        // });
        
        /* Media */
        $(document).ready(function(){
          $('.materialboxed').materialbox();
        });
        /* Tabs */
        $(document).ready(function(){
          $('.tabs').tabs();
        });
</script>
