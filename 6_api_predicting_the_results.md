# impulse-recommender-documentation

### API - Predicting the results

##### Use trained model to predicting values

There are 3 prediction ways:

###### Predict rate
```php
$model->predict('Logan', 'Anna');
```

which predicts rate for unrated "Logan" for user "Anna" by returning a number.

Results may vary from desired for improperly trained or not trained Learning Model.


###### Find similar items
```php
$model->findRelated('The Dark Knight', [
    'limit' => 5
])
```

which finds all items in ordered by similarity array.

###### Predict rate for user which has not rated any movie
```php
$model->predict("Forrest Gump");
```

which can be useful when the user has not rated any movie.

