<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<div class="site-contact">
    <h1>Victim Information</h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                'id' => 'victim-form',
                'action'=> 'update',
                ]);
            ?>
            <?= $form->field($model, 'victim_name') ?>
            <?= $form->field($model, 'victim_phone_no') ?>
            <?= $form->field($model, 'victim_district') ?>
            <?= $form->field($model, 'victim_address')->textArea(['rows' => 6]) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
