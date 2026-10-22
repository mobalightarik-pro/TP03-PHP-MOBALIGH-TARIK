<?php
require_once "config.php";

if (
    !isset($_POST["nom"], $_POST["note_info"], $_POST["note_math"])
) {
    exit("Erreur : champs manquants.");
}

$nom = trim($_POST["nom"]);
$info = $_POST["note_info"];
$math = $_POST["note_math"];

if ($nom === "" || $info === "" || $math === "") {
    exit("Erreur : tous les champs sont obligatoires.");
}

if (!is_numeric($info) || !is_numeric($math)) {
    exit("Erreur : notes non numériques.");
}

$info = (float) $info;
$math = (float) $math;

if (
    $info < NOTE_MIN || $info > NOTE_MAX ||
    $math < NOTE_MIN || $math > NOTE_MAX
) {
    exit("Erreur : les notes doivent être entre "
        . NOTE_MIN . " et " . NOTE_MAX . ".");
}

$moyenne = ($info + $math) / 2;

if ($moyenne >= 16) {
    $mention = "Très bien";
} elseif ($moyenne >= 14) {
    $mention = "Bien";
} elseif ($moyenne >= 12) {
    $mention = "Assez bien";
} elseif ($moyenne >= SEUIL) {
    $mention = "Passable";
} else {
    $mention = "Ajourné";
}


$dossier = __DIR__ . "/data";

if (!is_dir($dossier)) {
    mkdir($dossier, 0775, true);
}

$fichier = fopen($dossier . "/notes.csv", "a");

if ($fichier === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

fputcsv($fichier, [$nom, $info, $math], ";");
fclose($fichier);

$nom_securise = htmlspecialchars($nom, ENT_QUOTES, "UTF-8");

echo "<h2>Récapitulatif</h2>";
echo "Nom : $nom_securise<br>";
echo "Note Informatique : $info<br>";
echo "Note Mathématiques : $math<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Mention : $mention<br>";
echo "<a href='saisie.html'>Ajouter un autre apprenant</a><br>";
echo "<a href='liste.php'>Voir la liste</a>";
?>