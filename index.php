<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gaulois</title>
</head>

<body>

    <?php

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=gaulois', 'root', '');

        // Exécution de la requête SELECT
        $results = $db->query('SELECT personnage.*, lieu.nom_lieu, specialite.nom_specialite FROM personnage LEFT JOIN lieu ON personnage.id_lieu = lieu.id_lieu LEFT JOIN specialite ON personnage.id_specialite = specialite.id_specialite');


        // Affichage du début du tableau HTML avec les en-têtes des colonnes
        echo '<table>';
        echo '<tr><th>id_personnage</th><th>nom_personnage</th><th>adresse_personnage</th><th>image_personnage</th><th>id_lieu</th><th>id_specialite</th></tr>';

        // Boucle sur les résultats de la requête
        while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // Affichage des valeurs de chaque colonne dans une cellule du tableau
            echo '<td>' . $row['id_personnage'] . '</td>';
            echo '<td>' . $row['nom_personnage'] . '</td>';
            echo '<td>' . ($row['adresse_personnage'] ?? 'Inconnu') . '</td>';
            echo '<td>' . $row['image_personnage'] . '</td>';
            echo '<td>' . ($row['nom_lieu'] ?? 'Inconnu') . '</td>';
            echo '<td>' . ($row['nom_specialite'] ?? 'Inconnu') . '</td>';
            echo '</tr>';
        }

        // Fermeture du tableau HTML
        echo '</table>';
    } catch (Exception $e) {
        // Gestion des erreurs
        die('Erreur : ' . $e->getMessage());
    }

    ?>
</body>

</html>