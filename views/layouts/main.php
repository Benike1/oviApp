<?php

/* @var $this View */

/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

$this->title = Yii::$app->name;
$guest = Yii::$app->user->isGuest;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container" style="padding: 30px 15px 20px;">
        <?= $this->render('header') ?>
    </div>
    <?php if (!$guest) { ?>
        <div class="col-md-2">
            <?= $this->render('left') ?>
        </div>
    <?php } ?>
    <div class="col-md-<?= $guest ? 12 : 10 ?>>">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Designed by Benjamin <?= date('Y') ?></p>
        <p class="pull-right"><?= 'Ovi App' ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
