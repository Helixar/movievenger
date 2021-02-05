<?php
if (isset($_POST['username'])) { 

    if (empty($_POST['username'])) {
        echo "Veuillez saisir un pseudo.";
    } else {
        
        if (empty($_POST['password'])) {
            echo "Veuillez saisir un mot de passe.";
        } else {
            
            $Pseudo = htmlentities(trim($_POST['username']), ENT_QUOTES, "ISO-8859-15"); 
            $Password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-15");
            
            if (!$mysqli) {
                echo "Erreur de connexion à la base de données.";
            } else {
                $login = new Category();
                $login->logUser($Pseudo, $Password); 

                if (mysqli_num_rows($Requete) == 0) {
                    echo "L'identifiant ou le mot de passe est incorrect.";
                } else {
                    $_SESSION['pseudo'] = $Pseudo; 
                    header("Location: index.php");
                }
            }
        }
    }
}
