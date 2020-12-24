<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\helpers\Unit;
use app\widgets\IfIsDetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Protection */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список составов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="protection-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->protection_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->protection_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= IfIsDetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            [
                'attribute' =>'solution',
                'value' => function($value) {
                    return ($value->solution) ? 'Да' : 'Нет';
                },
            ],
            'ratio',
            'typeName',
            'toxicName',
            Unit::celsius($model->t_work_max, 't_work_max'),
            Unit::celsius($model->t_work_min, 't_work_min'),
            Unit::celsius($model->t_store_max, 't_store_max'),
            Unit::celsius($model->t_store_min, 't_store_min'),
            [
                'attribute' => 'typeAreaName',
            ],
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $model->ratesDataProvider(),
        'columns' => [
            'description:ntext',
            'quantityName',
            [
                'attribute' => 'sulute',
                'value' => function($value) use ($model) {
                    return ($value->sulute) ? $value->sulute : $model->sulute;
                },
                'visible' => (bool)$model->solution,
            ],
            [
                'attribute' => 'solvent',
                'value' => function($value) use ($model) {
                    return ($value->solvent) ? $value->solvent : $model->solvent;
                },
                'visible' => (bool)$model->solution,
            ],
            'layers',
            'inter_layer',
            'ready',
        ],
        'layout' => "{items}",
    ]);

    ?>

</div>
