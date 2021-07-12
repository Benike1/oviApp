<?php

/* @var $this View */

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\web\View;

?>
<header class="main-header">
    <a href="<?= Yii::$app->homeUrl ?>" class="logo"><?= Yii::$app->name ?></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="padding-right: 10px" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
            <?= Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right p-1'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        [
                            'label' => 'Bejelentkezés',
                            'url' => ['/site/login']
                        ] : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Kijelentkezés (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn logout',
                            'style'=> 'padding: 15px 20px; background-color: #222d32; color: #b8c7ce;'
                            ]
                        )
                        . Html::endForm()
                        . '</li>'
                    ),
                    Yii::$app->user->isGuest ?
                        [
                            'label' => 'Regisztráció',
                            'url' => ['/site/signup'],
                        ] : ''
                ],
            ]) ?>
    </nav>
</header>
