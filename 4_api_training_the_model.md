# impulse-ml-recommender-php-documentation

### 4. API - Training the model

##### Train the model

You can get this done by using:

```php
$trainer = new Impulse\Recommender\Trainer($model, [
    'learningRate' => 0.01,
    'iterations' => 20000,
    'verbose' => TRUE, // print debug messages
    'verboseStep' => 1000 // step interval from displaying debug messages
]);

$trainer->train();
```

Note that training time may take very long when your dataset is really large. It can be optimised
more or less by
choosing more accurate "learningRate" and "iterations" parameters.

