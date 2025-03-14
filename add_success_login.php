<?php
// Přihlášení
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_user = 'administrace';
    $admin_pass = 'kebabkebab69'; // Doporučeno hashovat v produkci
    
    if ($_POST['username'] === $admin_user && $_POST['password'] === $admin_pass) {
        $_SESSION['loggedin'] = true;
        header("Location: add_success.php");
        exit;
    } else {
        $error = "Nesprávné přihlašovací údaje!";
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Přihlášení do administrace</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Uživatelské jméno" required>
            <input type="password" name="password" placeholder="Heslo" required>
            <button type="submit">Přihlásit se</button>
        </form>
    </div>
</body>
</html>
