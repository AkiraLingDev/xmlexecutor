<?php

require_once ($_SERVER["DOCUMENT_ROOT"]."/core/interface/loader.php");
global $USER;
$USER = new User();

$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
session_start();
if((!$USER->isAuthorized()) && ($url != "/auth/") && !defined('IS_AGENT')){
    header("Location: /auth/");
    exit;
}
global $DB;
$DB = new DB();

function ComponentManager($name){
    require ($_SERVER["DOCUMENT_ROOT"]."/core/components/".$name."/component.php");
}
if($_POST["ajax"] != true) {
    require ($_SERVER["DOCUMENT_ROOT"]."/core/blocks/header.php");
}
