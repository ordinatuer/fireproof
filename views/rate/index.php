<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Степени защиты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ещё степень защиты', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'rate_id',
            [
                'attribute' => 'protection_id',
                'value' => 'protection.name',
            ],
            'description:ntext',
            //'note:ntext',
            [
                'attribute' => 'quantity',
                'value' => function($value) {
                    if ($value->quantity) {
                        return $value->quantity;
                    }
                    
                    if ($value->quantity_min AND $value->quantity_max) {
                        return $value->quantity_min .' - '. $value->quantity_max;
                    }

                    return null;
                },
            ],
            //'sulute',
            //'solvent',
            'layers',
            //'inter_layer',
            //'ready',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
