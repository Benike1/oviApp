<?php

/* @var $this yii\web\View */

?>
<div class="container text-center">
    <div class="body-content">
        <h2>Üdvözli, az Óvodai nyilványtartó Rendszer</h2>
        <?php if (Yii::$app->user->isGuest) { ?>
            <p>Bejelentkezéshez kattintson  a bejelentkezés gombra! (Jobb felső sarok)</p>
        <?php } ?>
    </div>
</div>

