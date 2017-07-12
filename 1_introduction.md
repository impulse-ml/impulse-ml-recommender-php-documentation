# impulse-recommender-documentation

### 1. Introduction

##### About 
Impulse Recommender is PHP library which can be used to share
personalized content for users on your website. It is written in PHP
and requires no additional dependencies. With OOP API you can achieve good
prediction results and you can quickly apply recommender system in any PHP
application, e.g. in Wordpress, Drupal or any other PHP framework based application.

##### Machine Learning
Recommender system is a machine learning problem. Given items (i.e. movies rated by user) 
are possible to rate by users (i.e. 0 - 5 star rating). With given
rating data Recommender System can predict movie
ratings, of those movies which are unrated by the user or find similar movies. 

Impulse Recommender uses **Collaborative** **Filtering** algorithm
so it is not required to provide item features, which can be 
understand as real item categories (i.e. comedy or action movie and their values) and it is
not required to provide category features which can be understand as user preferences. The system learns 
by itself with only given items, categories and defined ratings.

As long as you set Learning Model parameters and Training parameters 
properly you might end up with pretty good prediction of rating the movie 
which is not rated by user yet - assuming that the more ratings you give the more accurate 
predictions you will get.

Impulse Recommender uses the gradient descent learning algorithm.

For general details about Recommender Systems you might consider visit
[Wikipedia - Recommender System](https://en.wikipedia.org/wiki/Recommender_system) to get 
intuition what is going on under the hood.