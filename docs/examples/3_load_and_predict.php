<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once __DIR__ . '/../src/Impulse/Recommender/Builder.php';

$model = Impulse\Recommender\Builder::load(__DIR__, 'save1');

echo "Prediction for 'Guardians of the Galaxy' for user 'Barbara': {$model->predict('Guardians of the Galaxy', 'Barbara')}\n";
echo "Prediction for 'Guardians of the Galaxy' for user 'Charlie': {$model->predict('Guardians of the Galaxy', 'Charlie')}\n";
echo "Prediction for 'Logan' for user 'Anna': {$model->predict('Logan', 'Anna')}\n";
echo "Prediction for 'Logan' for user 'Dave': {$model->predict('Logan', 'Dave')}\n";

echo "Prediction for 'Logan' for user with has not rated any movie: {$model->predict('Logan')}\n";

echo "Related movies dump:\n";

var_dump($model->findRelated('The Dark Knight', [
    'limit' => 5
]));