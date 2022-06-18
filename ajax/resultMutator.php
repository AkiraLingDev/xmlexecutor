<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/core/prolog.php");
if ($_POST["ajax"] == true) {
    $result = json_decode($_POST['info'], true);
    $arResult['OK'] = array();
    $arResult['TROUBLES'] = array();
    foreach ($result as $item) {
        if (!empty($item['OK'])) {
            foreach ($item['OK'] as $ok) {
                $arResult['OK'][] = $ok;
            }
        }
        if (!empty($item['TROUBLES'])) {
            foreach ($item['TROUBLES'] as $trouble) {
                $arResult['TROUBLES'][] = $trouble;
            }
        }
    }
    History::addRecord($_POST['url'], array('OK' => count($arResult['OK']), 'ERR' => count($arResult['TROUBLES'])));
        if (count($arResult['OK']) > 0){
            ?>
                <div class="xml-result-ok">
                    <div class="xml-result-ok-title"><span style="background-color: #86e386;border-radius: 6px;">200 OK</span> Корректный статус ответа - <?=count($arResult['OK'])?> стр.</div>
                    <div class="xml-result-ok-list-title">Показать список страниц</div>
                    <div class="xml-result-ok-list">
                        <? foreach($arResult['OK'] as $link){?>
                            <a href="<?=$link?>" class="xml-result-ok-link"><?=$link?></a>
                        <?}?>
                    </div>
                </div>
                <?php
        }
        if (count($arResult['TROUBLES']) > 0){
            ?>
                <div class="xml-result-err">
                    <div class="xml-result-err-title"><span style="background-color: #e76868;border-radius: 6px;">ERROR</span> Статус отличный от 200 ОК - <?=count($arResult['TROUBLES'])?> стр.</div>
                    <div class="xml-result-err-list-title">Показать список страниц со статусами</div>
                    <div class="xml-result-err-list">
                        <? foreach($arResult['TROUBLES'] as $item){?>
                            <a href="<?=$item['link']?>" class="xml-result-err-link"><?=$item['link']?> - <?=$item['status']?></a>
                        <?}?>
                    </div>
                </div>
                <?php
        }
        ?>
            <script>
                $('.xml-result-ok-list-title').click(function () {
                    $('.xml-result-ok-list').toggle();
                });
                $('.xml-result-err-list-title').click(function () {
                    $('.xml-result-err-list').toggle();
                });
            </script>
            <?php
}
?>