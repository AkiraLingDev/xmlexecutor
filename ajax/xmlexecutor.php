<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/core/prolog.php");
if ($_POST["ajax"] == true) {
    ini_set('max_execution_time', 6000);
    ini_set('display_errors', 'Off');
    $xml = new XE();
    $arResult['info'] = $xml->executeByStep($_POST['url'], $_POST['step']);
    $arResult['current_step'] = $_POST['step'];
    echo json_encode($arResult);
}
?>