<?php
$connexion = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
/*if(isset($connexion)){
    echo 'connexion réussi';
}
*/
    $login = '';
    $prenom = '';
    $nom = '';
    $password = '';
    $confirm = '';


?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="module">
        <title>Inscription</title>
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
                Inscription
            </div>
            <section class="cadre-inscription">
                <div class="tab-inscription">
                    <form method="post">
                    
                    <label for="login">Login :</label>
                    <input type="text" name="login" id="login" placeholder="entrez votre login"><br><br>
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" placeholder="entrez votre prénom"><br><br>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" placeholder="entrez votre nom"><br><br>
                    <label for="password">M.D.P :</label>
                    <input type="password" name="password" id="password" placeholder="entrez votre mot de passe"><br><br>
                    <label for="confirm_password">Confirmez :</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="confirmez votre mot de passe"><br><br>
                    <?php
                    if(isset($_POST['submit'])){
    $login = trim($_POST['login']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);

    $verif = "SELECT login FROM utilisateurs WHERE login = '$login'";
    $verif_suite = mysqli_query($connexion, $verif);



if(!empty($login) && !empty($prenom) && !empty($nom) && !empty($password) && !empty($confirm)){
    if(mysqli_num_rows($verif_suite) == 0){
        if($password == $confirm){
            $query = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')";
            mysqli_query($connexion, $query);
            header("Location:connexion.php");

        }else
            echo 'Les mots de passe ne sont pas identiques.';
    }else 
        echo 'Ce login existe déja';
}
else
    echo 'Veuillez remplir le formulaire s\'il vous plait ! ';
}
?>
                </div>
            </section>
            <div class="button-deco">
                    <input type="submit" name="submit" value="S'inscrire !">
                </form>
            </div>
        </main>
        <footer class="footer-inscription">
            <img class = "fot" src="images-module/playlogo.png" alt = " Logo playstation ">
        </footer>


