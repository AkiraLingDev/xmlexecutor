<?php if (count($arResult) > 0) :?>
<div class="main-history-block">
    <div class="main-history-title">История запросов:</div>
    <div class="main-history-container">
        <? foreach ($arResult as $item) {
            ?>
            <div class="main-history-item">
                <div class="main-history-url">
                    <?=$item['url']?>
                </div>
                <div class="main-history-date">
                    <?=$item['date']?>
                </div>
                <div class="main-history-ok">
                    <span style="background-color: #86e386;border-radius: 6px;">200 OK</span> <?=$item['ok']?>
                </div>
                <div class="main-history-error">
                    <span style="background-color: #e76868;border-radius: 6px;">ERROR</span> <?=$item['error']?>
                </div>
                <div class="main-history-repeat">
                    <a href="/xmlexecute/?url=<?=$item['url']?>">Повторить</a>
                </div>
            </div>
            <?
        }?>
    </div>
</div>
<?php endif;?>