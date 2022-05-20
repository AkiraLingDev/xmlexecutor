<?php
global $USER;
if ($USER->isAuthorized()) {
    $arResult = History::getList();
    include("template.php");
}