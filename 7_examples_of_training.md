# Examples of training

According to our data table from lecture 2_problem_motivation.md consider the following learning parameters
for this dataset:

 -  1: learningRate = 0.0001, iterations = 1000
 -  2: learningRate = 0.1, iterations = 10000
 -  3: learningRate = 0.0001, iterations = 100000
 -  4: learningRate = 0.01, iterations = 100000
 
You might end up with following debug messages:

### Ex. 1

learningRate = 0.0001, iterations = 1000

![Ex. 1](img/training_example_1.png?raw=true)


The learningRate is too low and the iterations are too low - we have untrained model with high error.

### Ex. 2

learningRate = 0.1, iterations = 10000

![Ex. 2](img/training_example_2.png?raw=true)

The learningRate is too high cause after some step we have got numerical computation error.

### Ex. 3

learningRate = 0.0001, iterations = 100000

![Ex. 3](img/training_example_3.png?raw=true)

It is quite good error, but you might consider setting number of iterations to higher value or
increasing learning rate.

### Ex. 4

learningRate = 0.01, iterations = 100000

![Ex. 4](img/training_example_4.png?raw=true)

After some steps we are not minimizing the error which is very close to 0
so you might consider decrease number of iterations.

### Note

The following examples with too large number of iterations should not have big impact on the time of
training the model according to our small dataset used in previous examples.
You might consider adjust more accurate parameters in larger datasets.