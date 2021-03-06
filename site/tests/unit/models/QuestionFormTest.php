<?php

namespace site\tests\unit\models;

use Yii;
use \site\models\QuestionForm;
use \yii\di\Container;

class QuestionFormTest extends \Codeception\Test\Unit
{
  use \Codeception\Specify;

  private $container;

  public function setUp() {
    $this->container = new Container;
    $this->container->set('common\interfaces\UserInterface', '\site\tests\_support\MockUser');
    $this->container->set('common\interfaces\UserOptionInterface', '\site\tests\_support\MockUserOption');
    $this->container->set('common\interfaces\QuestionInterface', '\site\tests\_support\MockQuestion');
    $this->container->set('common\interfaces\TimeInterface', function () {
      return new \common\components\Time('America/Los_Angeles');
    });
  }

  public function testAttributeLabels()
  {
    $this->specify('setOptions should function properly', function () {
      $model = $this->container->get('\site\models\QuestionForm');
      expect('attributeLabels should be correct', $this->assertEquals($model->attributeLabels(), [
        'user_option_id1' => 'Restoration',
        'user_option_id2' => 'Forgetting Priorities',
        'user_option_id3' => 'Anxiety',
        'user_option_id4' => 'Speeding Up',
        'user_option_id5' => 'Ticked Off',
        'user_option_id6' => 'Exhausted',
        'user_option_id7' => 'Relapsed/Moral Failure'
      ]));
    });
  }

  public function testGetBhvrValidator()
  {
    $model = $this->container->get('\site\models\QuestionForm');
    $validator = $model->getBhvrValidator();

    $this->specify('getBhvrValidator should function properly', function () use($model, $validator) {
      expect('getBhvrValidator should return false when nothing is set on the form', $this->assertFalse($validator($model, "user_option_id1")));
      expect('getBhvrValidator should return false when nothing is set on the form', $this->assertFalse($validator($model, "user_option_id7")));

      $model->answer_1a = "processing emotions";
      expect('getBhvrValidator should return true when there is one answer set for this option', $this->assertTrue($validator($model, "user_option_id1")));

      $model->answer_1b = "also processing emotions";
      expect('getBhvrValidator should return true when there are two answers set for this option', $this->assertTrue($validator($model, "user_option_id1")));

      $model->answer_1c = "yep, processing emotions";
      expect('getBhvrValidator should return true when there are three answers set for this option', $this->assertTrue($validator($model, "user_option_id1")));

      expect('getBhvrValidator should return false when the answers that are set are NOT for this option', $this->assertFalse($validator($model, "user_option_id3")));
    });
  }

  public function testGetPrefixProps()
  {
    $model = $this->container->get('\site\models\QuestionForm');

    $this->specify('getPrefixProps should function properly', function() use($model) {
      expect('getPrefixProps should strip out all the falsy propeties it finds', $this->assertEmpty($model->getPrefixProps('answer')));

      $model->answer_1a = 'processing emotions';
      expect('getPrefixProps should return non-falsy properties that have the given prefix', $this->assertEquals($model->getPrefixProps('answer'), ['answer_1a' => 'processing emotions']));
    });
  }

  public function testBehaviorToAnswers()
  {
    $this->specify('behaviorToAnswers should function properly', function() {
      $model = $this->container->get('\site\models\QuestionForm');
      $model->answer_1a = 'answering question a';
      $model->answer_1b = 'answering question b';
      $model->answer_1c = 'answering question c';

      $model->answer_2a = 'answering question a';
      $model->answer_2b = 'answering question b';
      $model->answer_2c = 'answering question c';

      expect('behaviorToAnswers should return the answer properties related to the behavior number supplied', $this->assertEquals($model->behaviorToAnswers(1), [
                                                               'a' => 'answering question a',
                                                               'b' => 'answering question b',
                                                               'c' => 'answering question c'
                                                             ]));

      expect('behaviorToAnswers should return the the empty set when there are no answers associated with the supplied behavior number', $this->assertEmpty($model->behaviorToAnswers(7)));
    });
  }

  public function testGetAnswers()
  {
    $model = $this->container->get('\site\models\QuestionForm');

    $this->specify('getAnswers should function properly', function() use($model) {
      $model->user_option_id1 = 'dummy';
      $model->user_option_id2 = 'dummy';
      $model->user_option_id3 = 'dummy';
      $model->answer_1a = "processing emotions";
      $model->answer_1b = "processing emotions";
      $model->answer_1c = "processing emotions";
      $model->answer_2a = "processing emotions";
      $model->answer_2b = "processing emotions";
      $model->answer_2c = "processing emotions";
      $model->answer_3a = "processing emotions";
      $model->answer_3b = "processing emotions";
      $model->answer_3c = "processing emotions";

      expect('getAnswers should extract and coerce the data correctly', $this->assertEquals($model->getAnswers([
        $this->fakeModel(7, 280),
        $this->fakeModel(13, 281),
        $this->fakeModel(28, 284)
      ]), [ [
										'option_id' => 280,
										'user_bhvr_id' => 7,
										'question_id' => 1,
										'answer' => 'processing emotions',
									], [
										'option_id' => 280,
										'user_bhvr_id' => 7,
										'question_id' => 2,
										'answer' => 'processing emotions',
									], [
										'option_id' => 280,
										'user_bhvr_id' => 7,
										'question_id' => 3,
										'answer' => 'processing emotions',
									], [
										'option_id' => 281,
										'user_bhvr_id' => 13,
										'question_id' => 1,
										'answer' => 'processing emotions',
									], [
										'option_id' => 281,
										'user_bhvr_id' => 13,
										'question_id' => 2,
										'answer' => 'processing emotions',
									], [
										'option_id' => 281,
										'user_bhvr_id' => 13,
										'question_id' => 3,
										'answer' => 'processing emotions',
									], [
										'option_id' => 284,
										'user_bhvr_id' => 28,
										'question_id' => 1,
										'answer' => 'processing emotions',
									], [
										'option_id' => 284,
										'user_bhvr_id' => 28,
										'question_id' => 2,
										'answer' => 'processing emotions',
									], [
										'option_id' => 284,
										'user_bhvr_id' => 28,
										'question_id' => 3,
										'answer' => 'processing emotions',
									]]));
    });
  }

  private function fakeModel($id, $option_id) {
    $class = new \stdClass;
    $class->id = $id;
    $class->option_id = $option_id;
    return $class;
  }
}
