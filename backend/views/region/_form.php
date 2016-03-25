<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Region */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput([
    'maxlength' => true,
]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

