<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'php/head.php'; ?>
    <title>Créer un compte</title>
</head>
<body>
    <?php require_once 'php/header.php'; ?>
    <?php require_once 'php/navbar.php'; ?>
    <h1 class="text-center my-4">Créer un compte</h1>
    <form action="register.php" method="post" class="d-flex justify-content-center align-items-center flex-column">
        <label for="username" class="form-label">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password" class="form-label">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>

        <label for="passwordconfirm" class="form-label">Confirmer le mot de passe :</label>
        <input type="password" id="passwordconfirm" name="passwordconfirm" required><br>

        <input type="submit" value="S'inscrire">
    </form>
    <?php
    try {
        require_once 'php/database.php';
    }
    catch (Exception $e) {
        die('Une erreur est survenue. Veuillez réessayer plus tard.');
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordconfirm = $_POST['passwordconfirm'];

        if($password !== $passwordconfirm) {
            echo "<p style='color:red;'>Les mots de passe ne correspondent pas.</p>";
            exit;
        }
        else{

            // TODO: Ajouter la logique d'inscription (validation, enregistrement en base de données, etc.)

            $q = $db ->prepare("INSERT INTO user (user_name, user_password) VALUES (:username, :password)");
            $q->execute([
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            $_SESSION['username'] = $username;
            $_SESSION['userid'];

            $q = $db -> prepare("SELECT user_id FROM user WHERE user_name = :username");
            $q->execute(['username' => $username]);
            $user = $q->fetch();

            $_SESSION['userid'] = $user['user_id'];

            echo "<p class='success'>Inscription réussie pour l'utilisateur : $username</p>";
        }
    }
    ?>
    <?php require_once 'php/footer.php'; ?>
</body>
</html>