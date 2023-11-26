<?php
    // echo '<pre>';
    // print_r($_GET);
    // echo '</pre>'; 

if(isset($_GET['table'], $_GET['ind'])) {
    $table = $_GET['table'];
    $indice = $_GET['ind'];
    if($indice == 'A'){
        include("contenus/consult.php");
    }
    else if($indice == 'B'){
        include("contenus/modif.php");
    }
}
else{
    include("contenus/acceuil.php");
}