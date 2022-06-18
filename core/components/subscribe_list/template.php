<?php if (count($arResult) > 0) :?>
    <div class="profile-subscribes-block">
        <div class="profile-subscribes-title">Список подписок:</div>
        <div class="profile-subscribes-container">
            <? foreach ($arResult as $item) {
                ?>
                <div class="profile-subscribes-item">
                    <div class="profile-subscribes-url">
                        <?=$item['url']?>
                    </div>
                    <div class="profile-subscribes-period">
                        Каждые <?=$item['period']?>ч
                    </div>

                    <div class="profile-subscribes-delete">
                        <span class="subscribe-delete-button" data-id="<?=$item['id']?>">Удалить</span>
                    </div>
                </div>
                <?
            }?>
        </div>
    </div>
<?php endif;?>