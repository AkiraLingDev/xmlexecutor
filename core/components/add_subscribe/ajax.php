<?php require_once($_SERVER["DOCUMENT_ROOT"]."/core/prolog.php");
if ($_POST['ajax']) {
    if (!empty($_POST['url']) && ($_POST > 0)) {
        $url = $_POST['url'];
        $period = $_POST['period'];
        if(Subscribe::add($url, $period)){
            $response = 'true';
        }

    }
}else{
    echo "Only AJAX allowed!";
}