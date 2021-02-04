<?php
session_start(); 
if (isset($_POST['username'])) { 

    if (empty($_POST['username'])) {
        echo "Veuillez saisir un pseudo.";
    } else {
        
        if (empty($_POST['password'])) {
            echo "Veuillez saisir un mot de passe.";
        } else {
            
            $Pseudo = htmlentities(trim($_POST['username']), ENT_QUOTES, "ISO-8859-15"); 
            $Password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-15");
            
            $mysqli = mysqli_connect("localhost", "root", "", "movievenger");
            
            if (!$mysqli) {
                echo "Erreur de connexion à la base de données.";
            } else {
                $Requete = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '" . $Pseudo . "' AND password = '" . $Password . "'");

                if (mysqli_num_rows($Requete) == 0) {
                    echo "L'identifiant ou le mot de passe est incorrect.";
                } else {
                    $_SESSION['pseudo'] = $Pseudo; 
                    echo "<p>Vous êtes à présent connecté !</p>";
                }
            }
            $lBdd = null;
        }
    }
}
