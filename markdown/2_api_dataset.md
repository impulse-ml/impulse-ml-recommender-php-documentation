# impulse-ml-recommender-php-documentation

### 2. API - Dataset

#### Passing data to Impulse-ML: Recommender Dataset

Each algorithm, not only machine learning algorithm Impulse-ML: Recommender, must have knowledge about
your data. Since the PHP applications use different storage systems Impulse-ML: Recommender has no database
data fetcher - you might consider pass data directly to Dataset class instance.

Consider the following code:

```php
include_once __DIR__ . '/../src/Impulse/Recommender/Dataset.php';

$dataset = new Impulse\Recommender\Dataset();

$dataset->addItem(Impulse\Recommender\Dataset\Item::create('The Dark Knight'));
$dataset->addCategory(Impulse\Recommender\Dataset\Category::create('Anna'));
$dataset->addRating(Impulse\Recommender\Dataset\Rating::create('The Dark Knight', 'Anna', 0));
```

It is minimum example to set 1 item (The Dark Knight), 1 category (Anna) and set it's rating to value of 0 
by user Anna.

The example does not have any sense because we might want to have multiple items, categories as ratings - but
you should have knowledge how to pass data to recommender system.

In this example I used strings as my items, but ```Impulse\Recommender\Dataset\Item::create``` 
and ```Impulse\Recommender\Dataset\Category::create``` methods can also get an integer instead
of string. You might consider pass integers to dataset as long as their values correspond to database
primary keys and you will save a lot of memory than using a strings.

Also, each of those 2 ```create``` methods can get second parameter which has no defined and no
required data type. You might
consider pass to it an array with your database model data for future use if database primary keys is not 
so much useful.

The ```Impulse\Recommender\Dataset\Rating::create``` requires 3 parameters, which the first 2 - the item and
the category should be already added to dataset and the third one should be numeric value. 
There is no minimum or 
maximum value, but different ranges of all ratings can require a different learning parameters. You might
consider pass NULL if item is not rated but it is not required.

For real life example of creating dataset check [examples/1_train_and_predict.php](../examples/1_train_and_predict.php)

