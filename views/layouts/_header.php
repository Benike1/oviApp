<?php

/* @var $this View */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\web\View;

?>
<header class="main-header">
    <a href="<?= Yii::$app->homeUrl ?>" class="logo"><?= Yii::$app->name ?></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>

        <div class="navbar-custom-menu">
            <?php NavBar::begin() ?>
            <?= Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        [
                            'label' => 'Bejelentkezés',
                            'url' => ['/site/login']
                        ] : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    ),
                    Yii::$app->user->isGuest ?
                        [
                            'label' => 'Regisztráció',
                            'url' => ['/site/signup']
                        ] : ''
                ],
            ]) ?>
            <?php NavBar::end() ?>
        </div>
    </nav>
</header>
