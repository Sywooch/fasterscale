<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = 'The Faster Scale App | Login';
?>
<div class="site-login">
  <h1>Login</h1>
  <p>Please fill out the following fields to login:</p>

  <div class="row">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="col s12 m6">
      <?= $form->field($model, 'username_or_email') ?>
    </div>
    <div class="col s12 m6">
      <?= $form->field($model, 'password')->passwordInput() ?>
    </div>
    <div class="row">
      <div class="col s12">
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div style="color:#999;margin:1em 0">
          If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
        </div>
        <div class="form-group">
          <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>
