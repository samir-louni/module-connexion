<?php
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
$query = mysqli_query($connexion, 'SELECT * FROM `utilisateurs` WHERE 1');
//$headt = mysqli_query ($connexion, 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=\'commentaires\'');
$all_result = mysqli_fetch_all($query);
    //var_dump($resultat); 
  
    //if(isset($connexion)){
    //echo 'connexion réussi';
    //}

 

    
        if (!isset($_SESSION["login"])) {
            header("Refresh: 3; url=connexion.php");
            echo "<p>Tu ne peux pas accéder a cette page.</p><br><p>Redirection en cours...</p>";
            exit(0);
        }
        if ($_SESSION["login"] != "admin") {
            header("Refresh: 3; url=profil.php");
            echo "<p>Vous n'etes pas un admin</p><br><p>Redirection en cours...</p>";
            exit(0);
        }


?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="module">
        <title>Admin</title>
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
                    </nav>
                </section>
        </header>
        <main>
            <div class="titre-admin">
                Session Admin
            </div>
    <section class="tableaucentre">
        <table class="tab-or">
            <thead>
                <tr>
                    <td><h3>ID<h3></td>
                    <td><h3>Login<h3></td>
                    <td><h3>Prenom<h3></td>
                    <td><h3>Nom<h3></td>
                    <td><h3>Password<h3></td>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all_result as $key) {
                echo "<tr>";
        
            foreach ($key as $value) {
                echo "<td>$value</td>";
            }
                echo "</tr>";
            }
            if (isset($_POST['deconnecter'])) {
                session_unset ( );
                header("Location: index.php"); 
                }
            ?>
            </tbody>
        </table>
    </section>
        <div class="button-deco">
            <form action="" method="post">
                <input type="submit" name="deconnecter" value="Déconnexion">
            </form>
        </div>
        </main>
        <footer class="footer-admin">
            <img class = "fot" src="images-module/playlogo.png" alt = " Logo playstation ">
        </footer>
    </body>
</html>

