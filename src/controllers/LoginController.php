<?php
if (isset($_POST['pseudo'])) {

    if (empty($_POST['pseudo'])) {
        echo "Veuillez saisir un pseudo.";
    } else {
        
        if (empty($_POST['password'])) {
            echo "Veuillez saisir un mot de passe.";
        } else {

            $login = new Category();
            $request = $login->logUser($_POST['pseudo'], $_POST['password']);

            if (empty($request)) {
                echo "L'identifiant ou le mot de passe est incorrect.";
            } else {
                $_SESSION['pseudo'] = $_POST['pseudo'];
                header("Location: /");
            }
        }
    }
}
