<?php
if (!isset($_GET["nom"], $_GET["prenom"], $_GET["sexe"])) {
    exit("Champs manquants.");
}

$nom = trim($_GET["nom"]);
$prenom = trim($_GET["prenom"]);
$sexe = $_GET["sexe"];

if ($nom === "" || $prenom === "") {
    exit("Veuillez remplir tous les champs.");
}

if ($sexe === "M") {
    $civilite = "Monsieur";
} elseif ($sexe === "F") {
    $civilite = "Madame";
} else {
    exit("Sexe invalide.");
}

echo "Bonjour " . $civilite . " "
    . htmlspecialchars($prenom, ENT_QUOTES, "UTF-8") . " "
    . htmlspecialchars($nom, ENT_QUOTES, "UTF-8");
?>