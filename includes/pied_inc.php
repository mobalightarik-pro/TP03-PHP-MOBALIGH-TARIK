<?php
// Auteur : TARIK MOBALIGH
// Objectif : Afficher le pied de page et les dates
// Date : 18/10/2026

$date_fin = new DateTime("2027-01-31");
$aujourd_hui = new DateTime("today");

$difference = $aujourd_hui->diff($date_fin);
$jours_restants = (int) $aujourd_hui->format("Ymd")
    <= (int) $date_fin->format("Ymd")
    ? $difference->days
    : 0;
?>

<hr>

<footer>
    <p>TP PHP — <?= date("d/m/Y") ?></p>

    <p>
        Jours restants avant la fin du semestre :
        <?= $jours_restants ?>
    </p>
</footer>

</body>
</html>