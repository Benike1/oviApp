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
                    'url' => '/teacher/index',
                    'label' => 'Óvónők',
                    'icon' => 'user'
                ],
                [
                    'label' => 'Szülők & gyerekek', 'items' => [
                        [
                            'url' => '/caregiver/index',
                            'label' => 'Szülők',
                            'icon' => 'user'
                        ],
                        [
                            'url' => '/student/index',
                            'label' => 'Óvodások',
                            'icon' => 'user'
                        ],
                        [
                            'url' => '/student-has-caregiver/index',
                            'label' => 'Összerendelés',
                            'icon' => 'user'
                        ],
                    ]
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
