# impulse-recommender-documentation

### API - Training the model

##### Train the model

You can get this done by using:

```php
$trainer = new Impulse\Recommender\Trainer($model, [
    'learningRate' => 0.01,
    'iterations' => 2000,
    'verbose' => TRUE, // print debug messages
    'verboseStep' => 20 // step interval from displaying debug messages
]);

$trainer->train();
```

Note that training time may take very long when your database is really large. It can be optimised by
choosing more accurate "learningRate" and "iterations" parameters.

