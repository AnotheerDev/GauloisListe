<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=gaulois', 'root', '');
    foreach ($db->query('SELECT * FROM personnage') as $row) {
        print_r($row);
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
