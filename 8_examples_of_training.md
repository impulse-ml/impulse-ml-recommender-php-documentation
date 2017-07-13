# impulse-recommender-documentation

### Examples of training

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
Error: 45.697008230439
Error: 45.673298261996
Error: 45.650756435762
Error: 45.62866667389
Error: 45.606332556453
Error: 45.583054764145
Error: 45.558108724663
Error: 45.530721752861
Error: 45.500048989406
Error: 45.465147439801
```

The learningRate is too low and the iterations are too low - we have untrained model with high error.

###### Ex. 2

learningRate = 0.1, iterations = 10000

```text
Starting train with 10000 iterations.
Error: 45.479312259084
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
Error: NAN
```

The learningRate is too high cause after some step we have got numerical computation error.

###### Ex. 3

learningRate = 0.0001, iterations = 100000

```text
Starting train with 100000 iterations.
Error: 45.536692780576
Error: 0.0050570121394892
Error: 0.00076741031487873
Error: 0.0002433251289907
Error: 7.7274822087558E-5
Error: 2.4833005765218E-5
Error: 8.0890664013749E-6
Error: 2.6621036738157E-6
Error: 8.8193875299363E-7
Error: 2.9334198440834E-7
Error: 9.7788780298776E-8
Error: 3.2639511383413E-8
Error: 1.0901596138917E-8
Error: 3.6424386184489E-9
Error: 1.2172415736276E-9
```

It is quite good error, but you might consider setting number of iterations to higher value.

###### Ex. 4

learningRate = 0.01, iterations = 100000

```text
Starting train with 100000 iterations.
Error: 45.637422604147
Error: 4.6725552374453E-9
Error: 1.4196599398092E-13
Error: 4.3166977553481E-18
Error: 1.3129673074054E-22
Error: 4.678660073156E-27
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
Error: 2.0650899384489E-28
```

After some step we are not minimizing the error so you might consider decrease number of iterations.

#### Note

The following examples with too large number of iterations should not have big impact on the time of
training the model according to our small dataset used in previous examples.
You might consider adjust more accurate parameters in larger datasets.