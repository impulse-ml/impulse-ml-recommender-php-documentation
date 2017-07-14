# impulse-recommender-documentation

### API - Predicting the results

##### Use trained model to predicting values

There are 3 prediction ways:

###### Predict rate
```php
$model->predict('Logan', 'Anna'); // float(9.9920072216264E-14)
```

which predicts rate for unrated "Logan" for user "Anna" by returning a number.

Results may vary from desired for improperly trained or not trained Learning Model.


###### Find similar items
```php
$model->findRelated('The Dark Knight', [
    'limit' => 1
])
```

outputs
```text
array(1) {
  [0]=>
  array(2) {
    ["similarity"]=>
    float(2.2657653531155E-11)
    ["model"]=>
    array(2) {
      ["_id"]=>
      string(23) "Guardians of the Galaxy"
      ["data"]=>
      NULL
    }
  }
}
```

which finds all items in ordered by similarity array.

###### Predict rate for user which has not rated any movie
```php
$model->predict("Forrest Gump"); // int(2)
```

which can be useful when the user has not rated any movie so he has no computed preferences.

