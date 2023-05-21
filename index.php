<?php

try {
    // Connexion à la base de données
    $db = new PDO('mysql:host=localhost;dbname=gaulois', 'root', '');

    // Exécution de la requête SELECT
    $results = $db->query('SELECT * FROM personnage');

    // Affichage du début du tableau HTML avec les en-têtes des colonnes
    echo '<table>';
    echo '<tr><th>id_personnage</th><th>nom_personnage</th><th>adresse_personnage</th><th>image_personnage</th><th>id_lieu</th><th>id_specialite</th></tr>';

    // Boucle sur les résultats de la requête
    while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // Affichage des valeurs de chaque colonne dans une cellule du tableau
        echo '<td>' . $row['id_personnage'] . '</td>';
        echo '<td>' . $row['nom_personnage'] . '</td>';
        echo '<td>' . $row['adresse_personnage'] . '</td>';
        echo '<td>' . $row['image_personnage'] . '</td>';
        echo '<td>' . $row['id_lieu'] . '</td>';
        echo '<td>' . $row['id_specialite'] . '</td>';
        echo '</tr>';
    }

    // Fermeture du tableau HTML
    echo '</table>';
} catch (Exception $e) {
    // Gestion des erreurs
    die('Erreur : ' . $e->getMessage());
}

?>
