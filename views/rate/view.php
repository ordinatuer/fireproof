<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */

$this->title = $model->protection->name;
$this->params['breadcrumbs'][] = ['label' => 'Степени защиты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->rate_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->rate_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'rate_id',
            [
                'attribute' => 'protection_id',
                'value' => $model->protection->name,
            ],
            'description:ntext',
            [
                'attribute' => 'note',
                'value' => ($model->note) ? $model->note : null,
                'format' => 'ntext',
            ],
            'quantity',
            [
                'attribute' => 'sulute',
                'value' => $model->protection->sulute,
            ],
            [
                'attribute' => 'solvent',
                'value' => $model->protection->solvent,
            ],
            'layers',
            'inter_layer',
            'ready',
        ],
    ]) ?>

</div>
