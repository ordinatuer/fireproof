<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\helpers\Unit;

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'protection_id',
            'name',
            'description:ntext',
            [
                'attribute' =>'solution',
                'value' => function($value) {
                    return ($value->solution) ? 'Да' : 'Нет';
                },
            ],
            
            'ratio',
            // 'sulute',
            // 'solvent',
            //'type',
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

</div>
