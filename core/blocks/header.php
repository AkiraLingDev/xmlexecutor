<!DOCTYPE html>
<html>
<head>
    <title><? echo "заглушка"?></title>
    <link rel="stylesheet" href="/core/assets/style.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='/core/assets/script.js'></script>
</head>
<body>
<? include($_SERVER["DOCUMENT_ROOT"]."/core/assets/icons.html"); ?>
<? if($USER->isAuthorized()): ?>
<div class="header">
    <div class="profile-header"><?=$USER->getLogin()?></div>
    <div class="logout-block"><a href="/auth/logout.php" class="logout-link">Выйти</a></div>
</div>
<?endif;?>
<div class="main">