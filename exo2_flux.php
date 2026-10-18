<?php
include("configue.php");
$note = 14;
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
echo "Mention : " . mention($note);
?>


<?php
$mois_actuel = date("m");
$nom_mois = "";
switch ($mois_actuel) {
    case "01":
        $nom_mois = "Janvier";
        break;
    case "02":
        $nom_mois = "Février";
        break;
    case "03":
        $nom_mois = "Mars";
        break;
    case "04":
        $nom_mois = "Avril";
        break;
    case "05":
        $nom_mois = "Mai";
        break;
    case "06":
        $nom_mois = "Juin";
        break;
    case "07":
        $nom_mois = "Juillet";
        break;
    case "08":
        $nom_mois = "Août";
        break;
    case "09":
        $nom_mois = "Septembre";
        break;
    case "10":
        $nom_mois = "Octobre";
        break;
    case "11":
        $nom_mois = "Novembre";
        break;
    case "12":
        $nom_mois = "Décembre";
        break;
    default:
        $nom_mois = "Mois invalide";
        break;
}
echo "Nous sommes au mois de : " . $nom_mois;
?>

<?php

echo "<h3>1. Triangle d'étoiles</h3>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<hr>";
echo "<h3>2. Nombres de 0 à 20 (while)</h3>";
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }
    $i += 2;
}

echo "<hr>";
echo "<h3>3. Nombres pairs avec for et continue</h3>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 !== 0) {
        continue;
    }
    echo "$i<br>";
}

echo "<hr>";
$k = 0;
while (true) {
    $k++;
    switch ($k) {
        case 5:
            echo "At 5<br>";
            break;
        case 10:
            echo "At 10; quitting<br>";
            break 2;
        default:
            echo "Valeur de \$k : $k<br>";
            break;
    }
}

echo "<hr>";
echo "<h3>5. Nombres de 0 à 20 (do-while)</h3>";
$m = 0;
do {
    if ($m == 10) {
        echo "<strong>$m</strong><br>";
    } else {
        echo "$m<br>";
    }
    $m += 2;
} while ($m <= 20);
?>

