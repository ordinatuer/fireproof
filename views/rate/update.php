<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */

$this->title = Yii::t('app', 'Update') . ': ' . Yii::t('app', 'Protections rate') . ' ' . $model->protection->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Protections rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->protection->name, 'url' => ['view', 'id' => $model->rate_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'names' => $names,
    ]) ?>

</div>
