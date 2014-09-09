Coding Exercise
=============

A collection of particles is contained in a linear chamber. They all have the same speed, but some are headed toward the right and others are headed toward the left. These particles can pass through each other without disturbing the motion of the particles, so all the particles will leave the chamber relatively quickly.

You will be given the initial conditions by a String init containing at each position an 'L' for a leftward moving particle, an 'R' for a rightward moving particle, or a '.' for an empty location. init shows all the positions in the chamber. Initially, no location in the chamber contains two particles passing through each other. 

We would like an animation of the process. At each unit of time, we want a string showing occupied locations with an 'X' and unoccupied locations with a '.'. Create a class Animation that contains a method animate that is given an int speed and a String init giving the initial conditions. The speed is the number of positions each particle moves in one time unit.

The method will return an array of strings in which each successive element shows the occupied locations at the next time unit. The first element of the return should show the occupied locations at the initial instant (at time = 0) in the 'X', '.' format. The last element in the return should show the empty chamber at the first time that it becomes empty.

Class: Animation
Method: animate(speed, init), where speed is an integer and init is a String.

You may assume the following constraints:

- speed will be between 1 and 10 inclusive
- init will contain between 1 and 50 characters inclusive
- each character in init will be '.' or 'L' or 'R'

Examples

(Note that in the examples below, the double quotes should not be considered part of the input or output strings.)

0) 2, "..R...."

Returns:

	{ "..X....",
	 "....X..",
	 "......X",
	 "......." }

