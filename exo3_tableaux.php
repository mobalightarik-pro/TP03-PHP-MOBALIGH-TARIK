<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP Complet</title>
</head>
<body>

<?php
include 'configue.php';
$modules = ["PHP", "JavaScript", "HTML/CSS"];

$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

function afficher($tab) {
    echo '<table border="1">';
    echo '<tr><th>Nom</th><th>Note</th></tr>';
    foreach ($tab as $nom => $note) {
        echo '<tr>';
        echo '<td>' . $nom . '</td>';
        echo '<td>' . $note . ' / 20</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
<ul>
    <?php
    foreach ($modules as $module) {
        echo '<li>' . $module . '</li>';
    }
    ?>
</ul>

<h2>2. Affichage des modules par leur indice</h2>
<ul>
    <?php
    echo '<li>Indice 0 : ' . $modules[0] . '</li>';
    echo '<li>Indice 1 : ' . $modules[1] . '</li>';
    echo '<li>Indice 2 : ' . $modules[2] . '</li>';
    ?>
</ul>

<h2>Liste des Étudiants et Mentions</h2>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Note</th>
        <th>Mention</th>
    </tr>
    <?php
    foreach ($notes as $nom => $note) {
        echo '<tr>';
        echo '<td>' . $nom . '</td>';
        echo '<td>' . $note . ' / 20</td>';
        echo '<td>' . mention($note) . '</td>';
        echo '</tr>';
    }
    ?>
</table>

<?php
$somme = 0;
$total_etudiants = 0;
$premiere_note = reset($notes);
$note_max = $premiere_note;
$note_min = $premiere_note;

foreach ($notes as $nom => $note) {
    $somme += $note;
    $total_etudiants++;

    if ($note > $note_max) {
        $note_max = $note;
    }
    if ($note < $note_min) {
        $note_min = $note;
    }
}
$moyenne = $somme / $total_etudiants;

$somme_native = array_sum($notes);
$count_native = count($notes);
$moyenne_native = $somme_native / $count_native;
$max_native = max($notes);
$min_native = min($notes);

$effectifs = [
    "Très bien"  => 0,
    "Bien"       => 0,
    "Assez bien" => 0,
    "Passable"   => 0,
    "Ajourné"    => 0
];

foreach ($notes as $nom => $note) {
    $m = mention($note);
    $effectifs[$m]++;
}
?>

<ul>
    <?php
    echo '<li>Somme des notes : ' . $somme . '</li>';
    echo '<li>Moyenne des notes : ' . number_format($moyenne, 2) . ' / 20</li>';
    echo '<li>Meilleure note : ' . $note_max . ' / 20</li>';
    echo '<li>Plus faible note : ' . $note_min . ' / 20</li>';
    ?>
</ul>

<ul>
    <?php
    echo '<li>Somme (array_sum) : ' . $somme_native . '</li>';
    echo '<li>Nombre d\'apprenants (count) : ' . $count_native . '</li>';
    echo '<li>Moyenne : ' . number_format($moyenne_native, 2) . ' / 20</li>';
    echo '<li>Max (max) : ' . $max_native . ' / 20</li>';
    echo '<li>Min (min) : ' . $min_native . ' / 20</li>';
    ?>
</ul>

<h2>Effectifs par mention</h2>
<table border="1">
    <tr>
        <th>Mention</th>
        <th>Nombre d'apprenants</th>
    </tr>
    <?php
    foreach ($effectifs as $mention_nom => $nb_etudiants) {
        echo '<tr>';
        echo '<td>' . $mention_nom . '</td>';
        echo '<td>' . $nb_etudiants . '</td>';
        echo '</tr>';
    }
    ?>
</table>

<h2>Tri des tableaux</h2>

<h3>1. Noms croissants (ksort)</h3>
<?php
$tab1 = $notes;
ksort($tab1);
afficher($tab1);
?>

<h3>2. Notes décroissantes (arsort)</h3>
<?php
$tab2 = $notes;
arsort($tab2);
afficher($tab2);
?>

<h3>3. Noms décroissants (krsort)</h3>
<?php
$tab3 = $notes;
krsort($tab3);
afficher($tab3);
?>

<h3>4. Notes croissantes (asort)</h3>
<?php
$tab4 = $notes;
asort($tab4);
afficher($tab4);
?>

</body>
</html>