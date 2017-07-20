# 6. API - Full example

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
Starting train with 20000 steps.
Step 0 with error 45.480538085596
Step 1000 with error 0.14185749105855
Step 2000 with error 0.00012367547481656
Step 3000 with error 3.619659641736E-6
Step 4000 with error 1.2231304078042E-7
Step 5000 with error 5.7888427762046E-9
Step 6000 with error 4.3159398580704E-10
Step 7000 with error 4.2963851024733E-11
Step 8000 with error 4.7458579962238E-12
Step 9000 with error 5.3950928017295E-13
Step 10000 with error 6.1779842297497E-14
Step 11000 with error 7.0872758334659E-15
Step 12000 with error 8.1340228680908E-16
Step 13000 with error 9.3363924793255E-17
Step 14000 with error 1.0716785358187E-17
Step 15000 with error 1.2301363738974E-18
Step 16000 with error 1.4120237226256E-19
Step 17000 with error 1.6208264249521E-20
Step 18000 with error 1.8605120483173E-21
Step 19000 with error 2.1359434707995E-22
Training ended with error 2.4586853842564E-23 after 20000 steps.
Prediction for 'Guardians of the Galaxy' for user 'Barbara': 1.3472778448431E-11
Prediction for 'Guardians of the Galaxy' for user 'Charlie': 4.9999999999974
Prediction for 'Logan' for user 'Anna': 1.3994139180795E-11
Prediction for 'Logan' for user 'Dave': 3.9999999999967
Prediction for 'Logan' for user with has not rated any movie: 2
Related movies dump:
array(4) {
  [0]=>
  array(2) {
    ["similarity"]=>
    float(1.1086798146209E-11)
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
    float(0.17881301819823)
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
    float(0.92344428953759)
    ["model"]=>
    array(2) {
      ["_id"]=>
      string(12) "Forrest Gump"
      ["data"]=>
      NULL
    }
  }
  [3]=>
  array(2) {
    ["similarity"]=>
    float(1.7881301818354)
    ["model"]=>
    array(2) {
      ["_id"]=>
      string(7) "The Kid"
      ["data"]=>
      NULL
    }
  }
}
```

Check [examples/1_train_and_predict.php](examples/1_train_and_predict.php) for details.