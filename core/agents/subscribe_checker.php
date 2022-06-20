<?php
const IS_AGENT = true;
require_once($_SERVER["DOCUMENT_ROOT"]."/core/prolog.php");
$subscibesAr = Subscribe::getListCron();
foreach ($subscibesAr as $subscribe){
    unset($result);
    unset($arResult);
    echo $subscribe['next_start'].' - '.time().'<br>';
    if (true) {
        $xml = new XE();
        $steps = $xml->getSteps($subscribe['url']);
        for ($i = 1; $i <= $steps; $i++) {
            $result[] = $xml->executeByStep($subscribe['url'], $i);
        }
        $nextStart = time() + ($subscribe['period'] * 3600);
        $sqlRes = Subscribe::updateTime($subscribe['id'], $nextStart);
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

    }
}
//?>
<pre>
    <? print_r($arResult); ?>
</pre>