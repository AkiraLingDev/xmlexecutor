<?php require_once($_SERVER["DOCUMENT_ROOT"]."/core/prolog.php");
$sitemapUrl = $_GET['url'];
ini_set('display_errors', 'Off');
if(empty($sitemapUrl)){
    ?>
    <div class="empty-url-main">Задан пустой URL карты сайта</div>
    <?php
}else{
    ?>

    <script>
        $.ajax({
            url: '/ajax/xmlexecutor.php',
            method: 'post',
            dataType: 'html',
            data: {ajax: true, url: '<?=$sitemapUrl?>'},
            success: function(data){
                $('.xml-main-result').html(data);
                $('.xml-main-preloader').hide();
            }
        });
    </script>
    <div class="xml-main-preloader">
        Мы начали обрабатывать вашу карту сайта. Это может занять некоторое время, потерпите, пожалуйста.
        <img style="width: 20px;" src="/core/assets/img/preloader.gif">
    </div>
    <div class="xml-main-result"></div>
    <?php
}
?>
