<?php

use yii\helpers\Html;
use app\models\Country;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Freelancer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="freelancer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->dropDownList(
        ArrayHelper::map(Country::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Country']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>