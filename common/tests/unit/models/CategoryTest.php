<?php

namespace common\unit\models;

use Yii;
use Codeception\Specify;
use common\models\Category;

date_default_timezone_set('UTC');

/**
 * Time test
 */

class CategoryTest extends \Codeception\Test\Unit {
  use Specify;

  public function testGetCategories() {
    expect('getCategories', $this->assertEquals(Category::getCategories(), [
      1 => 'Restoration',
      2 => 'Forgetting Priorities',
      3 => 'Anxiety',
      4 => 'Speeding Up',
      5 => 'Ticked Off',
      6 => 'Exhausted',
      7 => 'Relapse/Moral Failure',
    ]));
  }

  public function testGetCategory() {
    expect('getCategory', $this->assertEquals(Category::getCategory('id', 3), ["id" => 3, "name" => "Anxiety", "weight" => 2]));
  }
}
