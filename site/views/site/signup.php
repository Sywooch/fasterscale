<?php
use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;
use yii\captcha\Captcha;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \site\models\SignupForm $model
 */
$this->title = 'The Faster Scale App | Signup';
$timezones = DateTimeZone::listIdentifiers();

$this->registerMetaTag([
  'name' => 'description',
  'content' => 'Sign up here for the Faster Scale App, the online version of the popular emotional mindfulness questionnaire. Sign up is easy and always completely free!'
]);
?>
<div class="site-signup">
  <h1>Signup</h1>
  <p>Please fill out the following fields to signup:</p>

			<?php $form = ActiveForm::begin([
				'id' => 'form-signup',
				'enableClientValidation' => true,
    'enableAjaxValidation' => false,
				'options' => ['validateOnSubmit' => true]
			]); ?>
  <div class="row">
    <div class="col l6">
        <?= $form->field($model, 'username') ?>
    </div>
    <div class="col l6">
        <?= $form->field($model, 'email')->input('email') ?>
    </div>
  </div>
  <div class="row">
    <div class="col l6">
        <?= $form->field($model, 'password') ?>
    </div>
    <div class="col l6">
        <?= $form->field($model, 'timezone')->dropDownList(array_combine($timezones, $timezones)); ?>
    </div>
  </div>
  <div class="row">
    <div class="col l6">
        <?= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
    </div>
  </div>
  <div class="row">
    <div class="col l6">
        <?= $form->field($model, 'send_email')->checkbox() ?>
        <div id='email_threshold_fields' <?php if(!$model->send_email) { ?>style="display: none;"<?php } ?>>
          <?= $form->field($model, 'email_threshold')->textInput(['class'=>'form-control'])->input('number', ['min' => 0, 'max' => 1000]) ?>
          <?= $form->field($model, 'partner_email1')->input('email')->input('email') ?>
          <?= $form->field($model, 'partner_email2')->input('email')->input('email') ?>
          <?= $form->field($model, 'partner_email3')->input('email')->input('email') ?>
        </div>
        <div class="form-group">
          <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>

<?php $this->registerJs(
  "$('#signupform-send_email').click(function() {
    $('#email_threshold_fields').toggle();
  });"
);
