<?php

use dmstr\widgets\Menu;
use yii\web\View;

/* @var $this View */
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?= Menu::widget([
            'items' => [
                [
                    'url' => '/user/index',
                    'label' => 'Felhasználók',
                    'icon' => 'user'
                ],
                [
                    'url' => '/caregiver/index',
                    'label' => 'Szülők',
                    'icon' => 'user'
                ],
                [
                    'url' => '/teacher/index',
                    'label' => 'Óvónők',
                    'icon' => 'user'
                ],
                [
                    'url' => '/student/index',
                    'label' => 'Óvodások',
                    'icon' => 'user'
                ],
                [
                    'url' => '/tool/index',
                    'label' => 'Eszközök',
                    'icon' => 'tool'
                ],
            ],
        ]) ?>
    </section>
</aside>
