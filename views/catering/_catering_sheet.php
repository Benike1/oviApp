<?php

use app\models\Catering;
use yii\helpers\Html;

/* @var $catering Catering */

$teacherDb = count(is_array($catering->teacher_ids) ? $catering->teacher_ids : []);
$fullPriceDb = count(is_array($catering->full_price_ids) ? $catering->full_price_ids : []);
$halfPriceDb = count(is_array($catering->half_price_ids) ? $catering->half_price_ids : []);
$nonPriceDb = count(is_array($catering->non_price_ids) ? $catering->non_price_ids : []);
?>

<?= Html::tag('h1', 'Étkeztetési nyilvántartás: ' . $catering->date) ?>
<h3>Dolgozók névsora:</h3>
<table style="width:100%">
    <tr>
        <th style="width:50%; background:#ecf0f5;">Név</th>
        <th style="width:50%; background:#ecf0f5;"></th>
    </tr>
    <?php foreach ($catering->getTeacherNames($catering->teacher_ids) as $index => $teacherName) { ?>
        <tr>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"><?= $teacherName ?></td>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
        </tr>
    <?php } ?>
</table>
<br>

<h3>Teljes árú óvodások névsora:</h3>
<table style="width:100%">
    <tr>
        <th style="width:50%; background:#ecf0f5;">Név</th>
        <th style="width:50%; background:#ecf0f5;"></th>
    </tr>
    <?php foreach ($catering->getStudentNames($catering->full_price_ids) as $index => $fullPriceNames) { ?>
        <tr>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"><?= $fullPriceNames ?></td>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
        </tr>
    <?php } ?>
</table>
<br>
<h3>Kedvezményezett (50%) óvodások névsora:</h3>
<table style="width:100%">
    <tr>
        <th style="width:50%; background:#ecf0f5;">Név</th>
        <th style="width:50%; background:#ecf0f5;"></th>
    </tr>
    <?php foreach ($catering->getStudentNames($catering->half_price_ids) as $index => $halfPriceNames) { ?>
        <tr>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"><?= $halfPriceNames ?></td>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
        </tr>
    <?php } ?>
</table>
<br>
<h3>Ingyenes óvodások névsora:</h3>
<table style="width:100%">
    <tr>
        <th style="width:50%; background:#ecf0f5;">Név</th>
        <th style="width:50%; background:#ecf0f5;"></th>
    </tr>
    <?php foreach ($catering->getStudentNames($catering->non_price_ids) as $index => $nonPriceNames) { ?>
        <tr>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"><?= $nonPriceNames ?></td>
            <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
        </tr>
    <?php } ?>
</table>
<br>
<h3>Össz. létszám:</h3>
<table style="width:100%">
    <tr>
        <td style="width:50%;"> Dolgozók száma:</td>
        <td style="width:50%;"> <?= $teacherDb ?></td>
    </tr>
    <tr>
        <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"> Teljes árúak száma</td>
        <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"> <?= $fullPriceDb ?></td>
    </tr>
    <tr>
        <td style="width:50%;"> Kedvezményezettek (50%) száma</td>
        <td style="width:50%;"> <?= $halfPriceDb ?></td>
    </tr>
    <tr>
        <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"> Ingyenesek száma</td>
        <td style="width:50%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"> <?= $nonPriceDb ?></td>
    </tr>
    <tr>
        <td style="width:50%;"> Összesen:</td>
        <td style="width:50%; background:#AAA555;"> <?= $teacherDb + $fullPriceDb + $halfPriceDb + $nonPriceDb ?></td>
    </tr>
</table>
<br>
