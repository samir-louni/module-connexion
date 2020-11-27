<?php
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
/*if(isset($connexion)){
    echo 'connexion réussi';
}
*/
// if (isset($_SESSION['login'])) {
//     $name = $_SESSION['login'];
//     echo "Bonjour $name";
// }


?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="module">
        <title>Connexion</title>
    </head>
    
    <body class="h1">
        <header>
                <section class="encart">
                    <div class="titre1">
                    <a href="index.php">
                        <img src="images-module/log.png" alt = "Logo Playstation">
                        </a>
                    </div>
                    <nav>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                    </nav>
                </section>
        </header>
        <main>
        <div class="titre-admin">
                Connexion
            </div>
            <section class="cadre-inscription">
                <div class="tab-inscription">
                    <form method="post">
                    
                    <label for="login">Login :</label>
                    <input type="text" name="login" id="login" placeholder="entrez votre login"><br><br>
                    <label for="password">M.d.p :</label>
                    <input type="password" name="password" id="password" placeholder="entrez votre mot de passe"><br><br>
                    <?php
                if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM utilisateurs WHERE login = '$login' && password='$password'";
    
    if(mysqli_num_rows(mysqli_query($connexion, $query)) > 0){
        $_SESSION['login'] = $login;
       if ($_POST['login'] == 'admin') {
           header("location: admin.php");
       }else header("location: profil.php");

    }else 
        echo "Le login ou le mot de passe n'est pas correct ! ";
}?>
                </div>
            </section>
            <div class="button-deco">
                    <input type="submit" name="submit" value="Connexion">
                </form>
            </div>
        </main>
        <footer class="footer-connexion">
            <img class = "fot" src="images-module/playlogo.png" alt = " Logo playstation ">
        </footer>
    </body>
</html>
