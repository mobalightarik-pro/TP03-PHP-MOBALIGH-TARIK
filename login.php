<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");

    if ($login === "") {
        $erreur = "Veuillez saisir un login.";
    } else {
        $_SESSION["login"] = $login;

        setcookie(
            "dernier_login",
            $login,
            time() + 86400,
            "/"
        );

        header("Location: profil.php");
        exit;
    }
}

$login_precedent = $_COOKIE["dernier_login"] ?? "";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>

<?php if (isset($erreur)): ?>
    <p><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<form method="POST" action="login.php">
    <label>Login :</label>

    <input
        type="text"
        name="login"
        value="<?= htmlspecialchars($login_precedent, ENT_QUOTES, 'UTF-8') ?>"
        required
    >

    <button type="submit">Se connecter</button>
</form>

</body>
</html>