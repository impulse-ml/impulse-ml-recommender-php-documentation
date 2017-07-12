# impulse-recommender-documentation

### Full example

```php
include_once __DIR__ . '/../src/Impulse/Recommender/Dataset.php';
include_once __DIR__ . '/../src/Impulse/Recommender/Model.php';
include_once __DIR__ . '/../src/Impulse/Recommender/Trainer.php';

$dataset = new Impulse\Dataset();

$dataset->addModel(Impulse\Recommender\Dataset\Model::create('The Dark Knight'));
$dataset->addModel(Impulse\Recommender\Dataset\Model::create('Guardians of the Galaxy'));
$dataset->addModel(Impulse\Recommender\Dataset\Model::create('Logan'));
$dataset->addModel(Impulse\Recommender\Dataset\Model::create('Forrest Gump'));
$dataset->addModel(Impulse\Recommender\Dataset\Model::create('The Kid'));

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

$model = new Impulse\Recommender\Model($dataset, [
    'numFeatures' => 2
]);

$trainer = new Impulse\Recommender\Trainer($model, [
    'learningRate' => 0.01,
    'iterations' => 2000,
    'verbose' => TRUE,
    'verboseStep' => 100
]);

$trainer->train();

var_dump($model->predict('Guardians of the Galaxy', 'Barbara'));
var_dump($model->predict('Guardians of the Galaxy', 'Charlie'));
var_dump($model->predict('Logan', 'Anna'));
var_dump($model->predict('Logan', 'Dave'));

var_dump($model->findRelated('The Dark Knight', [
    'limit' => 5
]));
```

Which may produce output:

```text
Starting train with 2000 iterations.
Error: 45.633998185471
Error: 0.18672580364272
Error: 0.12382484527408
Error: 0.060885610149411
Error: 0.020327678440386
Error: 0.0068354285954192
Error: 0.0034719604577244
Error: 0.002404372042155
Error: 0.0018566965762465
Error: 0.00147739116481
Error: 0.0011843545783611
Error: 0.00095047799347472
Error: 0.00076224514458098
Error: 0.00061059188006594
Error: 0.00048855185035881
Error: 0.0003905105710662
Error: 0.00031188359531368
Error: 0.0002489229076112
Error: 0.00019857225242491
Error: 0.0001583485064477
float(0.036841186144838)
float(4.9908378986326)
float(0.025326068392144)
float(3.9956326321871)
array(4) {
  [0]=>
  array(2) {
    ["value"]=>
    float(0.019180195668354)
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
    ["value"]=>
    float(0.27426468570586)
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
    ["value"]=>
    float(1.8574890814433)
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
    ["value"]=>
    float(2.5393691429878)
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