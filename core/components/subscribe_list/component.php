<?php
global $USER;
if ($USER->isAuthorized()) {
    $arResult = Subscribe::getList();
    include("template.php");
}
