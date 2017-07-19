# impulse-ml-recommender-php-documentation

### 7. Examples of training

According to our data table from lecture 2_problem_motivation.md consider the following learning parameters
for this dataset:

 - 1: learningRate = 0.0001, iterations = 1000
 - 2: learningRate = 0.1, iterations = 10000
 - 3: learningRate = 0.0001, iterations = 100000
 - 4: learningRate = 0.01, iterations = 100000
 
You might end up with following debug messages:

###### Ex. 1

learningRate = 0.0001, iterations = 1000

```text
Starting train with 1000 iterations.
Step X with error 45.697008230439
Step X with error 45.673298261996
Step X with error 45.650756435762
Step X with error 45.62866667389
Step X with error 45.606332556453
Step X with error 45.583054764145
Step X with error 45.558108724663
Step X with error 45.530721752861
Step X with error 45.500048989406
Step X with error 45.465147439801
```

The learningRate is too low and the iterations are too low - we have untrained model with high error.

###### Ex. 2

learningRate = 0.1, iterations = 10000

```text
Starting train with 10000 iterations.
Step X with error 45.479312259084
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
Step X with error NAN
```

The learningRate is too high cause after some step we have got numerical computation error.

###### Ex. 3

learningRate = 0.0001, iterations = 100000

```text
Starting train with 100000 iterations.
Step X with error 45.536692780576
Step X with error 0.0050570121394892
Step X with error 0.00076741031487873
Step X with error 0.0002433251289907
Step X with error 7.7274822087558E-5
Step X with error 2.4833005765218E-5
Step X with error 8.0890664013749E-6
Step X with error 2.6621036738157E-6
Step X with error 8.8193875299363E-7
Step X with error 2.9334198440834E-7
Step X with error 9.7788780298776E-8
Step X with error 3.2639511383413E-8
Step X with error 1.0901596138917E-8
Step X with error 3.6424386184489E-9
Step X with error 1.2172415736276E-9
```

It is quite good error, but you might consider setting number of iterations to higher value or better - 
increasing learning rate.

###### Ex. 4

learningRate = 0.01, iterations = 100000

```text
Starting train with 100000 iterations.
Step X with error 45.637422604147
Step X with error 4.6725552374453E-9
Step X with error 1.4196599398092E-13
Step X with error 4.3166977553481E-18
Step X with error 1.3129673074054E-22
Step X with error 4.678660073156E-27
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
Step X with error 2.0650899384489E-28
```

After some steps we are not minimizing the error which is very close to 0
so you might consider decrease number of iterations.

#### Note

The following examples with too large number of iterations should not have big impact on the time of
training the model according to our small dataset used in previous examples.
You might consider adjust more accurate parameters in larger datasets.