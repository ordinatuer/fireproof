<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Protection */

$this->title = 'Добавить новый огнезащитный состав';
$this->params['breadcrumbs'][] = ['label' => 'Список составов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
