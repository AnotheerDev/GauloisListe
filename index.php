<?php

$user = 'root';
$pass = '';

$db = new PDO('mysql:host=localhost;dbname=gaulois', $user, $pass);

foreach($db->query('SELECT * FROM personnage') as $row) {
    print_r($row);
}