<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use app\widgets\IfIsDetailView;

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

    <?= IfIsDetailView::widget([
        'model' => $model,
        // оптимизировать и убрать это крокодилово
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
                'visible' => (bool)$model->note,
            ],
            [
                'attribute' => 'quantity',
                'visible' => (bool)$model->quantity,
            ],
            [
                'attribute' => 'quantity_min',
                'visible' => (bool)$model->quantity_min,
            ],
            [
                'attribute' => 'quantity_max',
                'visible' => (bool)$model->quantity_max,
            ],
            [
                'attribute' => 'quantity_note',
                'format' => 'ntext',
                'visible' => (bool)$model->quantity_note,
            ],
            [
                'attribute' => 'sulute',
                'value' => $model->protection->sulute,
            ],
            [
                'attribute' => 'solvent',
                'value' => $model->protection->solvent,
            ],
            [
                'attribute' => 'layers',
                'visible' => (bool)$model->layers,
            ],
            'inter_layer',
            'ready',
        ],
    ]) ?>

</div>
