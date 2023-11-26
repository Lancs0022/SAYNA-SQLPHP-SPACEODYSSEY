<?php
/*
    La fonction suivante permet de se connecter à l'API "APOD" de la NASA 
    Une fois recupéré, les données récupérés 
*/

function recupAPIInfo($cleApi, $date) {
    // Spécifiez l'URL de l'API
    $api_url = 'https://api.nasa.gov/planetary/apod';

    // Construisez l'URL de la requête API avec les paramètres en utilisant la concaténation
    $requeteUrl = $api_url . '?api_key=' . $cleApi . '&date=' . $date;

    // Faites la requête API en utilisant file_get_contents
    $reponse = file_get_contents($requeteUrl);

    // Vérifiez si la requête a réussi
    if ($reponse === false) {
        return ['error' => 'Erreur lors de la récupération des données depuis l\'API APOD'];
    }

    // Décodez la réponse JSON
    $donnees = json_decode($reponse, true);

    // Vérifiez si la réponse contient des données valides
    if (!$donnees) {
        return ['error' => 'Erreur lors du décodage de la réponse JSON'];
    }

    // Accédez aux informations de l'APOD
    $title = $donnees['title'];
    $image_url = $donnees['url'];
    $explanation = $donnees['explanation'];

    // Retournez les informations de l'APOD dans un tableau
    return [
        'title' => $title,
        'image_url' => $image_url,
        'explanation' => $explanation
    ];
}

function afficheAPIInfo($info) {
    // Vérifiez s'il y a une erreur
    if (isset($info['error'])) {
        die($info['error']);
    }

    // Accédez aux informations renvoyées par la fonction
    $title = $info['title'];
    $image_url = $info['image_url'];
    $explanation = $info['explanation'];

    // Affichez les informations de l'APOD
    echo "<h2>$title</h2>";
    echo "<img src='$image_url' alt='$title'>";
    echo "<p>$explanation</p>";
}

function randomDateBetween($startDate, $endDate) {
    // Convertissez les chaînes de caractères en objets DateTime
    $startDateTime = new DateTime($startDate);
    $endDateTime = new DateTime($endDate);

    // Obtenez les timestamps Unix correspondants
    $startTimestamp = $startDateTime->getTimestamp();
    $endTimestamp = $endDateTime->getTimestamp();

    // Générez un timestamp aléatoire entre les deux dates
    $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);

    // Créez un nouvel objet DateTime avec le timestamp aléatoire
    $randomDate = new DateTime();
    $randomDate->setTimestamp($randomTimestamp);

    // Renvoyez la date au format Y-m-d (format ISO 8601)
    return $randomDate->format('Y-m-d');
}



$cleApi = ' x8IdyDHLUTgGdXnr5UtSlHaCji9rTQm0jc3ICzh7 ';
$date = '2023-11-26';
$info = recupAPIInfo($cleApi, $date);
afficheAPIInfo($info);


// Exemple d'utilisation de la génération de date aléatoire //

// $startDate = '2023-01-01';
// $endDate = '2023-12-31';
// $randomDate = randomDateBetween($startDate, $endDate);
// echo "Date aléatoire entre $startDate et $endDate : $randomDate";

?>