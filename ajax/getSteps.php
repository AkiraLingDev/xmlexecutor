<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/core/prolog.php");
if ($_POST["ajax"] == true) {
    $xml = new XE();
    $steps = $xml->getSteps($_POST['url']);
    echo json_encode(array('steps' => $steps));
}
