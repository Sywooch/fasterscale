<?php
use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\Button;
use macgyer\yii2materializecss\widgets\form\ActiveForm;
/**
 * @var yii\web\View $this
 */

$this->title = "Check-In";
$this->params['breadcrumbs'][] = $this->title;

function checkboxItemTemplate($index, $label, $name, $checked, $value) {
  return Html::checkbox
    (
      $name,
      $checked,
      [
        'value' => $value,
        'label' => $label,
        'container' => false,
        'labelOptions' =>
        [
          'class' => $checked ? '' : '',
        ],
      ]
    );
}
?>
<h1>Check-In</h1>
<p>Click all the options below that apply to your current emotional state. Once finished, click the submit button at the bottom.</p>
<?php
$form = ActiveForm::begin([
  'id' => 'checkin-form',
]);

// THIS IS A HACK UNTIL yii2-materializecss SUPPORTS CHECKBOXES
foreach($categories as $category) {
  print "<div class='row'>";
  foreach($optionsList[$category['id']] as $option_id => $option) {
    print "<span class='checkbox-item'>";
    print "<input type='checkbox' class='' id='{$category['id']}-$option_id' name='CheckinForm[options{$category['id']}][]' value=$option_id >";
    print "<label for='{$category['id']}-$option_id'>$option</label>";
    print "</span>";
  }
print "</div>";
}

print Html::submitButton('Submit', ['class' => 'btn btn-success']); 
ActiveForm::end();
?>
