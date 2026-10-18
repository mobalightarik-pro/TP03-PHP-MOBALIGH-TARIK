<?php
//bonjour
# bonjour
/* bonjour */




echo "hello php" ;
echo "<br>";


require("configue.php");
echo "l'établissement est : " . ETABLISSEMENT;
echo "<br>";
echo "la note minimale est : " . NOTE_MIN;
echo "<br>";
echo "la note maximale est : " . NOTE_MAX;
echo "<br>";
echo "le seuil est : " . SEUIL;
echo "<br>";

//si en peut afficher une constante no define il affiche un message d'erreur
/* la différence entre define et const est que const est utilisé pour définir des constantes au moment de 
la compilation, tandis que define est utilisé pour définir des constantes au moment de l'exécution.*/
?>

<?php
$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht + ($prix_ht * ($tva / 100));

echo "Le prix TTC du produit est de $prix_ttc €.";
?>


<?php
echo "<h2>1. Cast en string</h2>";
$test = 42;
$test = (string) $test;
var_dump($test); 


echo "<h2>2. Prédictions et vérifications des booléens</h2>";
var_dump((bool) 0);   
var_dump((bool) 0.0);   
var_dump((bool) "0"); 
var_dump((bool) "");  
var_dump((bool) "abc");  
var_dump((bool) []);      
var_dump((bool) null);   


echo "<h2>3. Conversions numériques (Prédites et vérifiées)</h2>";
var_dump((int) 3.9);      
var_dump((int) "12abc");  
var_dump((float) "1.5e3"); 
var_dump((int) true);     


echo "<h2>4. Représentations du nombre 255</h2>";
$decimal = 255; 
$hexadecimal = 0xFF;  
$octal = 0377;     
$binaire = 0b11111111; 

echo "Décimal : $decimal<br>";
echo "Hexadécimal : $hexadecimal<br>";
echo "Octal : $octal<br>";
echo "Binaire : $binaire<br>";
?>


<?php
$traitees = "égales à";
$ici = 2;

$texte = "*Bonjour les développeurs*";

$texte_nettoye = trim($texte, "*");
echo "Chaîne après trim() : " . $texte_nettoye . "<br><br>";

$longueur = strlen($texte_nettoye);
for ($i = 0; $i < $longueur; $i++) {
    echo $texte_nettoye[$i] . "<br>";
}
?>