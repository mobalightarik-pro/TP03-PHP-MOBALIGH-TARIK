<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$login = htmlspecialchars(
    $_SESSION["login"],
    ENT_QUOTES,
    "UTF-8"
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>

<h2>Bienvenue <?= $login ?> !</h2>

<p>Vous êtes connecté.</p>

<a href="deconnexion.php">Se déconnecter</a>

<hr>

<h3>Exercice 6.3 : Validation d'une date</h3>

<form method="POST">
    <label>Jour :</label>
    <input type="number" name="jour" min="1" max="31" required>

    <label>Mois :</label>
    <input type="number" name="mois" min="1" max="12" required>

    <label>Année :</label>
    <input type="number" name="annee" min="1900" max="2100" required>

    <button type="submit">Vérifier</button>
</form>

<?php
if (
    isset($_POST["jour"], $_POST["mois"], $_POST["annee"])
) {
    $jour = filter_var($_POST["jour"], FILTER_VALIDATE_INT);
    $mois = filter_var($_POST["mois"], FILTER_VALIDATE_INT);
    $annee = filter_var($_POST["annee"], FILTER_VALIDATE_INT);

    if (
        $jour !== false && $mois !== false && $annee !== false &&
        checkdate($mois, $jour, $annee)
    ) {
        echo "<p>Date valide : "
            . sprintf("%02d/%02d/%04d", $jour, $mois, $annee)
            . "</p>";
    } else {
        echo "<p>Date invalide.</p>";
    }
}
?>

</body>
</html>