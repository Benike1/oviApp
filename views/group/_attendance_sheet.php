<?php

use app\enums\GenderEnum;
use app\models\Group;
use yii\helpers\Html;

/* @var $group Group */

?>

<?= Html::tag('h1', $group->name . ' csoport ' . '(' . $group->age_group . ')') ?>

    <h3>Pedagógusok:</h3>
<?= implode(', ', $group->getTeacherNames()) ?>

    <h3>Óvodások névsora</h3>
    <span>Lányok</span>
    <table style="width:100%">
        <tr>
            <th style="width:33%; background:#ecf0f5;">Név</th>
            <th style="width:32%; background:#ecf0f5;"></th>
            <th style="width:33%; background:#ecf0f5;"></th>
        </tr>
        <?php foreach ($group->students as $index => $student) { ?>
            <?php if ($student->gender === GenderEnum::GILR) { ?>
                <tr>
                    <td style="width:33%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"><?= $student->name ?></td>
                    <td style="width:33%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
                    <td style="width:33%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>
    <br>
    <span>Fiúk</span>
    <table style="width:100%">
        <tr>
            <th style="width:33%; background:#ecf0f5;">Név</th>
            <th style="width:32%; background:#ecf0f5;"></th>
            <th style="width:33%; background:#ecf0f5;"></th>
        </tr>
        <?php foreach ($group->students as $index => $student) { ?>
            <?php if ($student->gender === GenderEnum::BOY) { ?>
                <tr>
                    <td style="width:33%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"><?= $student->name ?></td>
                    <td style="width:33%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
                    <td style="width:33%; <?= $index % 2 === 1 ? 'background:#ecf0f5;' : '' ?>"></td>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>
    <br>
    Óvodások száma:
<?= count($group->getStudentNames()) ?>