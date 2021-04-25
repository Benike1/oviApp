<?php

use dmstr\web\AdminLteAsset;
use dmstr\widgets\Alert;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

$this->title = Yii::$app->name;
$user = Yii::$app->user;

AdminLteAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <?php $this->head() ?>
</head>

<body class="hold-transition skin-black sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
    <?= $this->render('_header') ?>

    <?php if (!$user->isGuest) { ?>
        <?= $this->render('_sidebar') ?>
    <?php } ?>

    <div class="content-wrapper">
        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>
    </div>
    <footer class="main-footer">
        Készítette <strong>Tóth Benjámin</strong>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
