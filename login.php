<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require_once 'php/head.php'; ?>
        <title>Login</title>
    </head>
    <body class="bg-light">
        <?php require_once 'php/navbar.php'; ?>
        <?php require_once 'php/header.php'; ?>
        <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
            <h1 class="mb-4">Kards - Login</h1>
            <form id="loginForm" class="w-100" style="max-width:400px;" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="loginButton">Se connecter</button>
            </form>
            <div class="mt-3 w-100 text-center container">
                <div>
                    <a href="register.php">Pas de compte ?</a>
                </div>
                <div>    
                    <button type="button" class="btn btn-primary">Créez en un !</button>
                    <p>Créez un compte pour obtenir gratuitement des packs de cartes !</p>
                </div>
            <div id="message" class="mt-3 w-100 text-center">
            </div>
        </div>
        <?php
        try {
            require_once 'php/database.php';
            global $db;
        }
        catch (Exception $e) {
            die('Une erreur est survenue. Veuillez réessayer plus tard.');
        }

        if(isset($_POST['username']) && isset($_POST['password'])) {
            $q = $db -> prepare("SELECT * FROM user WHERE user_name = :username");
            $q -> execute(['username' => $_POST['username']]);
            $user = $q -> fetch();
            if($user && password_verify($_POST['password'], $user['user_password'])) {
                // Login successful
                $_SESSION['userid'] = $user['user_id'];
                $_SESSION['username'] = $user['user_name'];
                header("Location: index.php");
                exit();
            } else {
                // Login failed
                echo '<div class="alert alert-danger">Nom d\'utilisateur ou mot de passe incorrect.</div>';
            }
        }
        ?>
        <?php require_once 'php/footer.php'; ?>
    </body>
</html>