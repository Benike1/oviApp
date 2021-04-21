<?php

/* @var $this View */

use kartik\sidenav\SideNav;
use yii\web\View;

?>

<?php if (!Yii::$app->user->isGuest) { ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <?= SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Navigációs fül',
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
                ],
            ]) ?>
        </section>
    </aside>
<?php } ?>
