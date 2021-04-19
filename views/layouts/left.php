<?php

/* @var $this View */
/* @var $content string */

use kartik\sidenav\SideNav;
use yii\web\View;

?>

<?= SideNav::widget([
    'items' => [
        [
            'label' => 'Home',
            'url' => ['/site/index'],
            'icon' => 'home'
        ],
        [
            'url' => ['/site/about'],
            'label' => 'About',
            'icon' => 'info-sign',
            'items' => [
                ['url' => '#', 'label' => 'Item 1'],
                ['url' => '#', 'label' => 'Item 2'],
            ],
        ],
    ],
]) ?>

