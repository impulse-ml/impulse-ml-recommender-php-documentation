# impulse-ml-recommender-php-documentation

### Full example

```php
include_once __DIR__ . '/../src/Impulse/Recommender/Dataset.php';
include_once __DIR__ . '/../src/Impulse/Recommender/LearningModel.php';
include_once __DIR__ . '/../src/Impulse/Recommender/Trainer.php';

$dataset = new Impulse\Recommender\Dataset();

$dataset->addItem(Impulse\Recommender\Dataset\Item::create('The Dark Knight'));
$dataset->addItem(Impulse\Recommender\Dataset\Item::create('Guardians of the Galaxy'));
$dataset->addItem(Impulse\Recommender\Dataset\Item::create('Logan'));
$dataset->addItem(Impulse\Recommender\Dataset\Item::create('Forrest Gump'));
$dataset->addItem(Impulse\Recommender\Dataset\Item::create('The Kid'));

$dataset->addCategory(Impulse\Recommender\Dataset\Category::create('Anna'));
$dataset->addCategory(Impulse\Recommender\Dataset\Category::create('Barbara'));
$dataset->addCategory(Impulse\Recommender\Dataset\Category::create('Charlie'));
$dataset->addCategory(Impulse\Recommender\Dataset\Category::create('Dave'));

$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Dark Knight', 'Anna', 0));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Dark Knight', 'Barbara', 0));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Dark Knight', 'Charlie', 5));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Dark Knight', 'Dave', 5));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Guardians of the Galaxy', 'Anna', 0));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Guardians of the Galaxy', 'Barbara', NULL));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Guardians of the Galaxy', 'Charlie', NULL));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Guardians of the Galaxy', 'Dave', 5));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Logan', 'Anna', NULL));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Logan', 'Barbara', 0));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Logan', 'Charlie', 4));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Logan', 'Dave', NULL));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Forrest Gump', 'Anna', 4));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Forrest Gump', 'Barbara', 5));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Forrest Gump', 'Charlie', 0));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('Forrest Gump', 'Dave', 0));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Kid', 'Anna', 5));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Kid', 'Barbara', 5));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Kid', 'Charlie', 0));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Kid', 'Dave', 0));

$model = new Impulse\Recommender\LearningModel($dataset, [
    'numFeatures' => 2
]);

$trainer = new Impulse\Recommender\Trainer($model, [
    'learningRate' => 0.01,
    'iterations' => 20000,
    'verbose' => TRUE,
    'verboseStep' => 1000
]);

$trainer->train();

echo "Prediction for 'Guardians of the Galaxy' for user 'Barbara': {$model->predict('Guardians of the Galaxy', 'Barbara')}\n";
echo "Prediction for 'Guardians of the Galaxy' for user 'Charlie': {$model->predict('Guardians of the Galaxy', 'Charlie')}\n";
echo "Prediction for 'Logan' for user 'Anna': {$model->predict('Logan', 'Anna')}\n";
echo "Prediction for 'Logan' for user 'Dave': {$model->predict('Logan', 'Dave')}\n";

echo "Prediction for 'Logan' for user with has not rated any movie: {$model->predict('Logan')}\n";

echo "Related movies dump:\n";

var_dump($model->findRelated('The Dark Knight', [
    'limit' => 5
]));
```

Which may produce output:

```text
Starting train with 20000 iterations.
Error: 45.656298998607
Error: 0.00088837572273025
Error: 2.5217323195946E-5
Error: 8.586116826246E-7
Error: 4.1769999473736E-8
Error: 3.1969445733112E-9
Error: 3.2244796936373E-10
Error: 3.5836994713945E-11
Error: 4.0902823920142E-12
Error: 4.7000428251388E-13
Error: 5.4097461191428E-14
Error: 6.2291872540888E-15
Error: 7.1734842837508E-16
Error: 8.261136868883E-17
Error: 9.5137594842429E-18
Error: 1.0956330650439E-18
Error: 1.2617638729995E-19
Error: 1.4530971465143E-20
Error: 1.6734894976132E-21
Error: 1.9275050553146E-22
Training ended with error: 2.2257737878379E-23 after 20000 iterations.
Prediction for 'Guardians of the Galaxy' for user 'Barbara': -1.2847056751752E-11
Prediction for 'Guardians of the Galaxy' for user 'Charlie': 5.0000000000025
Prediction for 'Logan' for user 'Anna': -1.3292922318442E-11
Prediction for 'Logan' for user 'Dave': 4.0000000000031
Prediction for 'Logan' for user with has not rated any movie: 2
Related movies dump:
array(4) {
  [0]=>
  array(2) {
    ["similarity"]=>
    float(8.9166451999745E-12)
    ["model"]=>
    array(2) {
      ["_id"]=>
      string(23) "Guardians of the Galaxy"
      ["data"]=>
      NULL
    }
  }
  [1]=>
  array(2) {
    ["similarity"]=>
    float(0.24422436480274)
    ["model"]=>
    array(2) {
      ["_id"]=>
      string(5) "Logan"
      ["data"]=>
      NULL
    }
  }
  [2]=>
  array(2) {
    ["similarity"]=>
    float(2.4422436479744)
    ["model"]=>
    array(2) {
      ["_id"]=>
      string(7) "The Kid"
      ["data"]=>
      NULL
    }
  }
  [3]=>
  array(2) {
    ["similarity"]=>
    float(2.7761840696392)
    ["model"]=>
    array(2) {
      ["_id"]=>
      string(12) "Forrest Gump"
      ["data"]=>
      NULL
    }
  }
}
```