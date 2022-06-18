<?php require_once($_SERVER["DOCUMENT_ROOT"]."/core/prolog.php");
if ($_POST['ajax']) {
    if (!empty($_POST['id'])){
        if ($_POST['action'] == 'delete'){
            if(Subscribe::delete($_POST['id'])){
                $response = 'true';
            }
        }
    }
}else{
    echo "Only AJAX allowed!";
}