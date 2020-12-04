<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Protection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protection-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solution')->checkbox() ?>

    <?= $form->field($model, 'sulute')->textInput() ?>

    <?= $form->field($model, 'solvent')->textInput() ?>

    <?= $form->field($model, 'type')->checkboxList($model->types, [
        'item' => function($index, $label, $name, $checked, $value) use ($model) {
            return Html::label(
                Html::checkbox(
                    $name,
                    in_array($value, $model->typeForm),
                    [
                        'value' => $value,
                    ]
                ) . 
                $label
            );
        },
    ]) ?>

    <?= $form->field($model, 'toxic')->textInput() ?>

    <?= $form->field($model, 't_work_max')->textInput() ?>

    <?= $form->field($model, 't_work_min')->textInput() ?>

    <?= $form->field($model, 't_store_max')->textInput() ?>

    <?= $form->field($model, 't_store_min')->textInput() ?>

    <?= $form->field($model, 'type_area')->checkboxList($model->typeAreas, [
        'item' => function($index, $label, $name, $checked, $value) use ($model) {
            return Html::label(
                Html::checkbox(
                    $name,
                    in_array($value, $model->typeAreaForm),
                    [
                        'value' => $value,
                    ]
                ) . 
                $label
            );
        },
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
