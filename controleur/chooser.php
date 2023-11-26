<?php
    // echo '<pre>';
    // print_r($_GET);
    // echo '</pre>'; 

if(isset($_GET['choix'], $_GET['ind'])) {
    $choix = $_GET['choix'];
    $indice = $_GET['ind'];
    if($indice == 'A'){
        include("contenus/consult.php");
    }
    else if($indice == 'B'){
        include("contenus/modif.php");
    }
}
else if(isset($_GET['choix']) && !isset($_GET['ind'])){
    include("function/getApi.php");
}
else 
    include("contenus/acceuil.php");