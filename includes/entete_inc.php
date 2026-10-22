<?php
// Auteur : TARIK MOBALIGH
// Objectif : En-tête commun du site
// Date : 18/10/2026
// htmlspecialchars() convertit les caractères spéciaux HTML en entités HTML
// afin d'éviter que le navigateur interprète les données saisies par l'utilisateur
// comme du code HTML. Elle permet donc d'afficher ces données de manière sécurisée.
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suivi des notes</title>
</head>
<body>
<h1><?= htmlspecialchars(ETABLISSEMENT) ?></h1>
<hr>