# impulse-recommender-documentation

### API - Learning Model

##### Learn from dataset

Assuming that we have data stored in ```Impulse\Dataset``` we are ready to create a Learning Model.

We can done this by using:

```php
$model = new Impulse\Recommender\Model($dataset, [
    'numFeatures' => 2
]);
```

"numFeatures" is required parameter. It may strictly correspond to number of categories of database
models or number of user preferences.