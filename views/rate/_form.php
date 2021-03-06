<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'protection_id')
        ->dropDownList($names, [
            'prompt' => Yii::t('app', 'Select protection'),
        ]);
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'quantity_min')->textInput() ?>

    <?= $form->field($model, 'quantity_max')->textInput() ?>

    <?= $form->field($model, 'quantity_note')->textInput() ?>

    <?= $form->field($model, 'sulute')->textInput() ?>

    <?= $form->field($model, 'solvent')->textInput() ?>

    <?= $form->field($model, 'layers')->textInput() ?>

    <?= $form->field($model, 'inter_layer')->textInput() ?>

    <?= $form->field($model, 'ready')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
