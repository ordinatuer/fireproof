<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */

$this->title = 'Ещё степень защиты';
$this->params['breadcrumbs'][] = ['label' => 'Степенизащиты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'names' => $names,
    ]) ?>

</div>
