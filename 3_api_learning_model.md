# impulse-ml-recommender-php-documentation

### API - Learning Model

##### Learn from dataset

Assuming that we have data stored in ```Impulse\Recommender\Dataset``` we are ready to create
a Learning Model.

We can done this by using:

```php
$model = new Impulse\Recommender\LearningModel($dataset, [
    'numFeatures' => 2
]);
```

"numFeatures" is required parameter. It may strictly correspond to number of categories of database
items or number of defined user preferences. 
Notice that you don't need define how much every item belongs to
given category or how much user belongs to given preference. You just need know number of them.