# Impulse-ML: Recommender, the Recommender Engine

### About 
Impulse-ML: Recommender is PHP library which can be used to share
personalized content for users on your website. It is written in PHP
and requires no additional dependencies. With OOP API you can achieve good
prediction results and you can quickly apply recommender system in any PHP
application, e.g. in Wordpress, Drupal or any other PHP framework based application.

### Machine Learning
Recommender system solves a machine learning problem. Given items (i.e. movies rated by user) 
are possible to rate by users (i.e. 0 - 5 star rating). With given
rating data Recommender System can predict:

 -  movie ratings, of those movies which are unrated by the user
 -  find similar movies 
 -  get the prediction for user who don't rate any movie. 

Impulse-ML: Recommender uses **Collaborative** **Filtering** algorithm
so it is not required to provide item features, which can be 
understand as real item categories (i.e. comedy or action movie and their values) and it is
not required to provide category features which can be understand as user preferences.
The system learns 
by itself with only given items, categories and defined ratings.

As long as you set Learning Model parameters and Training parameters 
more accurate you might end up with pretty good prediction of rating the movie 
which is not rated by user yet - assuming that the more ratings you give the more accurate 
predictions you will get.

Impulse-ML: Recommender uses the gradient descent learning algorithm.

For general details about Recommender Systems you might consider visit
[Wikipedia - Recommender System](https://en.wikipedia.org/wiki/Recommender_system) to get 
intuition what is going on under the hood.

### Requirements

 -  PHP >= 5.4

### Table of contents

 -  [1. Problem motivation](1_problem_motivation.md)
     - [Do I need Impulse-ML: Recommender, the Recommender System?](1_problem_motivation.md#do-i-need-impulse-ml-recommender-the-recommender-system)
     - [Problem definition](1_problem_motivation.md#problem-definition)
     - [Training and training parameters](1_problem_motivation.md#training-and-training-parameters)
 -  [2. API - Dataset](2_api_dataset.md)
     - [Passing data to Impulse-ML: Recommender Dataset](2_api_dataset.md#passing-data-to-impulse-ml-recommender-dataset)
 -  [3. API - Learning Model](3_api_learning_model.md)
     - [Learning from dataset](3_api_learning_model.md#learning-from-dataset) 
 -  [4. API - Training the Learning Model](4_api_training_the_model.md)
     - [Training the model](4_api_training_the_model.md#training-the-model)
 -  [5. API - Predicting the results](5_api_predicting_the_results.md)
     - [Predict rating for user](5_api_predicting_the_results.md#predict-rating-for-user)
     - [Find similar items](5_api_predicting_the_results.md#find-similar-items)
     - [Predict rate for user which has not rated any movie](5_api_predicting_the_results.md#predict-rate-for-user-which-has-not-rated-any-movie)
 -  [6. API - Full Example](6_api_full_example.md)
 -  [7. Examples of training](7_examples_of_training.md)
 -  [8. API - Saving and restoring trained model](8_api_saving_and_restoring_trained_model.md)
     - [Save](8_api_saving_and_restoring_trained_model.md#save)
     - [Restore](8_api_saving_and_restoring_trained_model.md#restore)