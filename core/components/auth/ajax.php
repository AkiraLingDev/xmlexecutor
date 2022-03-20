<?php require_once($_SERVER["DOCUMENT_ROOT"]."/core/prolog.php");
if ($_POST['ajax']) {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if($USER->checkAuth($login, $password)){
            $response = '';
        }

    }
}else{
    echo "Only AJAX allowed!";
}
