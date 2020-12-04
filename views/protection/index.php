<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Огнезащитные составы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protection-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новый огнезащитный состав', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'protection_id',
            'name',
            'description:ntext',
            [
                'attribute' => 'solution',
                'value' => function($value) {
                    return ($value->solution) ? 'Да' : 'Нет';
                },
            ],
            'ratio',
            'typeName',
            //'toxic',
            'typeAreaName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
