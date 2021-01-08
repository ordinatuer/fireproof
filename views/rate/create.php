<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */

$this->title = Yii::t('app', 'Add protections rate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Protections rate'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'names' => $names,
    ]) ?>

</div>
