# impulse-recommender-documentation

### 2. Problem motivation

##### Do i need Impulse - Recommender System? 
If you are a PHP developer who maintains any PHP social application and you
want to predict the "rating" or "preference" that a user would give to an item
the Impulse - Recommender is library that you might consider to use!
In further readings I will show you how to use Impulse Recommender
and give you a hint on how to choose parameters which makes the predictions
more accurate.

##### Problem definition

Consider the following data:

```
+---------------------------------+------+---------+---------+---------+
| Movie \ User                    | Anna | Barbara | Charlie | Dave    |
+---------------------------------+------+---------+---------+---------+
| The Dark Knight                 | 0    | 0       | 5       | 5       |
+---------------------------------+------+---------+---------+---------+
| Guardians of the Galaxy         | 0    | ?       | ?       | 5       |
+---------------------------------+------+---------+---------+---------+
| Logan                           | ?    | 0       | 4       | ?       |
+---------------------------------+------+---------+---------+---------+
| Forrest Gump                    | 4    | 5       | 0       | 0       |
+---------------------------------+------+---------+---------+---------+
| The Kid                         | 5    | 5       | 0       | 0       |
+---------------------------------+------+---------+---------+---------+
```

In this particular example we can notice:
 - we have 5 items - 5 movies
 - we have 4 categories - 4 users
 - we can notice 2 types of items: action move or comedy movie
 - it seems that Anna and Barbara hates the action movies but love the comedy
 movies
 - it seems that Charlie and Dave loves the action movies but hates the 
 comedy movies
 - the table is incomplete because every user has not rated at least one movie
 
Using this data you might want to:
 - predict user rating of movie that is unrated by user i.e. to send user
 the movie which he would like but he does not rated that movie yet
 - get movies similar to given movie
 - get the prediction of the movie for user that has no rated any movie and use this data
 
Using Impulse - Recommeder System you might end up with such predictions:

```
+---------------------------------+------+---------+---------+---------+
| Movie \ User                    | Anna | Barbara | Charlie | Dave    |
+---------------------------------+------+---------+---------+---------+
| The Dark Knight                 | -    | -       | -       | -       |
+---------------------------------+------+---------+---------+---------+
| Guardians of the Galaxy         | -    | 0       | 5       | -       |
+---------------------------------+------+---------+---------+---------+
| Logan                           | 0    | -       | -       | 4       |
+---------------------------------+------+---------+---------+---------+
| Forrest Gump                    | -    | -       | -       | -       |
+---------------------------------+------+---------+---------+---------+
| The Kid                         | -    | -       | -       | -       |
+---------------------------------+------+---------+---------+---------+
```

We might notice:
 - Anna hates action movies so the prediction of "Logan" will be 0
 - Barbara also hates action movies so the prediction of "Guardians of the Galaxy" will be 0
 - Charlie loves the action movies so the prediction of "Guardians of the Galaxy" will be 5
 - Dave also loves the action movies so prediction of "Logan" will be 4 
 (not 5 since the maximum rating of this movie is equal 4)

That's how Collaborative Filtering works.

There is only one parameter for a Learning Model created from a dataset - number of features. Understand 
it like
type or real category of the item. It's value can be set equals number of item categories in your 
application.

There are two learning parameters: learning rate and number of iterations.

The learning rate is parameter which describes how much gradient descent will perform on
error function. You might to consider to increase or decrease this parameter because it has strong
correlation with number of iterations.

The number of iterations is parameter which describes how much steps gradient descent minimize function
will be applied. It's highly correlated with learning rate.

The results of prediction may vary from desired by setting this parameters less accurate.

However, there are some principles of setting these parameters more accurate in order to get
better prediction:
 - if you set small learning rate then you might consider increase number of iterations
 - if you set large learning rate then you might consider decrease number of iterations
 - you might expect very low error - in this example a reasonable error would be less than 0.0001
 - setting too high learning rate may cause algorithm miss correct item and category parameters so
 the error in next steps will be i.e. 2.01, -2.0, 1.98, -2.18 - when the best error result 
 would 0 we are missing the the minimum error
 
For this particular example i have set:
 - learning rate === 0.01
 - number of iterations === 2000
 - number of features === 2 (since i noticed two types of movies)
 
The key to get well trained model is to choose the right ratio of learning rate and number of iterations.
 
You might consider try different number of features according to your Application so the dataset also.

Above example was fully implemented in "examples/1.php".