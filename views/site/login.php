<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <div class="row">

        <div class="col-md-6">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <div class="form-group">
                <label>Nama Pengguna</label>
                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true])
                    ->label(false) ?>
            </div>
            
            <div class="form-group">
                <label>Kata Sandi</label>
                <?= $form->field($model, 'password')
                    ->passwordInput()
                    ->label(false) ?>
            </div>

            <div class="form-group form-check">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>

            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>
