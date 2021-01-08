<?php

use yii\helpers\Html;
use app\widgets\IfIsDetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */

$this->title = $model->protection->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Protections rates'), 'url' => ['index']];
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
                'confirm' => Yii::t('app', 'Confirm delete'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= IfIsDetailView::widget([
        'model' => $model,
        'attributes' => [
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
            
            'quantity',
            'quantity_min',
            'quantity_max',
            [
                'attribute' => 'quantity_note',
                'format' => 'ntext',
            ],
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
