<?php
global $USER;
if ($USER->isAuthorized()) {
    include("template.php");
}
