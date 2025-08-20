<?php

    // Créer la table users si elle n’existe pas
    $db->exec("CREATE TABLE IF NOT EXISTS utilisateurs(
        email TEXT PRIMARY KEY,
        nom TEXT  ,
        prenom TEXT NOT NULL,
        passwd TEXT NOT NULL
    )");
?>
