# impulse-ml-recommender-php-documentation

### 8. API - Saving and restoring the Learning Model

You probably don't want to train your model after each one rate given by user, but for sure you might want
to do that job outside your website because the training time could take very large amount of time.

For do this we have implemented saving and restoring your trained Learning Model.

To save the Learning Model you can use:

```php
include_once __DIR__ . '/../src/Impulse/Recommender/Builder.php';

$builder = new Impulse\Recommender\Builder($model);
$builder->save(__DIR__, 'save1');
```

and for restore:

```php
include_once __DIR__ . '/../src/Impulse/Recommender/Builder.php';

$model = Impulse\Recommender\Builder::load(__DIR__, 'save1');
```

Each of those methods takes 2 parameters which the first one is location of the directory to save the data,
and the second one is name of created directory for the data files.