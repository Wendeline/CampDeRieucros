<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Camp De Rieucros</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display|Montserrat" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo css_url('mat');?>"  media="screen,projection"/>
    <!-- <link type="text/css" rel="stylesheet" href="assets/css/nouislider.css"> -->

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="fr" />
    <meta name="author" lang="fr" content="Asheart">

    <!-- JS -->

    <script type="text/javascript" href="<?php echo js_url('nouislider');?>"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    
    <script type="text/javascript">
        function Search(search="") {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?php echo base_url('InfoUsers/ajaxS/') ;?>"+ search);

            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4 && xhr.status == 200){
                    document.getElementById('replaceBySearch').innerHTML = xhr.responseText;
                }
            }
            xhr.send();
        }
    </script>
</head>

<body>
