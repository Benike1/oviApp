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
                    'label' => 'Szülők & gyerekek',
                    'icon' => 'group',
                    'items' => [
                        [
                            'url' => '/caregiver/index',
                            'label' => 'Szülők',
                            'icon' => 'user'
                        ],
                        [
                            'url' => '/student/index',
                            'label' => 'Gyerekek',
                            'icon' => 'user'
                        ],
                        [
                            'url' => '/student-has-caregiver/index',
                            'label' => 'Összerendelés',
                            'icon' => 'compress'
                        ],
                    ]
                ],
                [
                    'label' => 'Csoportok',
                    'icon' => 'group',
                    'items' => [
                        [
                            'url' => '/group/index',
                            'label' => 'Csoportok',
                            'icon' => 'users'
                        ],
                        [
                            'url' => '/group-has-teacher/index',
                            'label' => 'Csoport & Óvónők',
                            'icon' => 'female'
                        ],
                        [
                            'url' => '/group-has-student/index',
                            'label' => 'Csoport & Gyerekek',
                            'icon' => 'child'
                        ],
                    ]
                ],
                [
                    'url' => '/tool/index',
                    'label' => 'Eszközök',
                    'icon' => 'gavel'
                ],
                [
                    'url' => '/catering/index',
                    'label' => 'Étkeztetés',
                    'icon' => 'cutlery'
                ],
                [
                    'label' => 'Médiatár',
                    'icon' => 'file',
                    'items' => [
                        [
                            'url' => '/file/index',
                            'label' => 'Fájlok',
                            'icon' => 'file'
                        ],
                        [
                            'url' => '/teacher-has-file/index',
                            'label' => 'Óvónők & fájok',
                            'icon' => 'female'
                        ],
                    ]
                ],
                [
                    'url' => '/setting/index',
                    'label' => 'Beállítások',
                    'icon' => 'cog'
                ],
            ],
        ]) ?>
    </section>
</aside>
