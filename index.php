<?php require_once($_SERVER["DOCUMENT_ROOT"]."/core/prolog.php");

//echo "Hello world";
?>
<div class="xml-input-main-block">
    <div class="xml-input-main-label">Введите адрес сайта для проверки:</div>
    <div class="xml-input-main-input">
        <input type="text" name="xml-input-main" id="xml-input-main"> <button id="xml-main-button">Проверить</button>
    </div>
</div>
<?php
ComponentManager("history");
?>