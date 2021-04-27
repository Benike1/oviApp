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
                    'label' => 'Csoportok', 'items' => [
                    [
                        'url' => '/group/index',
                        'label' => 'Csoport',
                        'icon' => 'users'
                    ],
                    [
                        'url' => '/group-has-teacher/index',
                        'label' => 'Csoport & óvónők',
                        'icon' => 'users'
                    ],
                    [
                        'url' => '/group-has-student/index',
                        'label' => 'Csoport & óvodások',
                        'icon' => 'users'
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
