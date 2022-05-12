<?php
global $USER;
if (!$USER->isAuthorized()) {
    if (!empty($_REQUEST['login']) && !empty($_REQUEST['password'])){
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $authRes = $USER->checkAuth($login, $password);
        if ($authRes) {
            header("Location: /");
            exit;
        }else{
            $arResult["MESSAGE"] = 'Неверный логин или пароль';
        }
    }
    include("template.php");
}else{
    header("Location: /");
}