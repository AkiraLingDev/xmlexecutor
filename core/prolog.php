<?php
echo "prolog is here";
require_once ($_SERVER["DOCUMENT_ROOT"]."/core/interface/loader.php");
global $USER;
$USER = new User();

$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];

if((!$USER->isAuthorized()) && ($url != "/auth/")){
    header("Location: /auth/");
    exit;
}

function ComponentManager($name){
    require ($_SERVER["DOCUMENT_ROOT"]."/core/components/".$name."/component.php");
}

require ($_SERVER["DOCUMENT_ROOT"]."/core/blocks/header.php");