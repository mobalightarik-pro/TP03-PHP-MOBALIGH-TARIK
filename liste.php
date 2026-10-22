<?php
require_once "config.php";

$fichier = __DIR__ . "/Data/notes.csv";

if (!file_exists($fichier)) {
    exit("Aucun apprenant enregistré.");
}

$handle = fopen($fichier, "r");

if ($handle === false) {
    exit("Erreur lors de l'ouverture du fichier.");
}

$somme_moyennes = 0;
$nombre = 0;

echo "<h2>Liste des apprenants</h2>";
echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>";

while (($ligne = fgetcsv($handle, 1000, ";")) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    [$nom, $info, $math] = $ligne;

    if (!is_numeric($info) || !is_numeric($math)) {
        continue;
    }

    $moyenne = ((float) $info + (float) $math) / 2;

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

    $nom = htmlspecialchars($nom, ENT_QUOTES, "UTF-8");

    echo "<tr>";
    echo "<td>$nom</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>" . round($moyenne, 2) . "</td>";
    echo "<td>$mention</td>";
    echo "</tr>";

    $somme_moyennes += $moyenne;
    $nombre++;
}

fclose($handle);

echo "</table>";

if ($nombre > 0) {
    echo "<p>Moyenne générale de la classe : "
        . round($somme_moyennes / $nombre, 2) . "</p>";
} else {
    echo "<p>Aucun résultat valide.</p>";
}
?>