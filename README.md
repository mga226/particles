Coding Exercise
=========

This was fun!

I chose to focus on separation of concerns and extensibility here. My basic approach was:

* create a simulation of the chamber (`Chamber`) and the particles (`Particle`).
* create an interface to convert to and from the ASCII-based input and output formats specified in the question (`ChamberIO`).
* create the `Animation` class specified in the question, which creates and runs the simulation and returns the results.

A couple of comments:

* Used a TDD approach, which may be obvious from the tests.
* I used manual loading and eschewed namespacing, just to guarantee you could easily run the code anywhere.
* Would be pretty easy to extend to 2 or 3 dimensions, add collision, etc.


### Example usage:

	require_once('autoload.php');
	$animation = new Animation();
	print_r($animation->animate(2, '..R....'));

produces:

	Array
	(
    	[0] => ..X....
    	[1] => ....X..
    	[2] => ......X
    	[3] => .......
	)

To test, you can play in `sandbox.php`, or just run the test suite.

=======
Particles
=========

Was in talks with a company about a software engineer position recently, and part of the process was a "code test." The job didn't end up being a fit, but my solution to the test got a great response and I felt pretty happy with it.

Coming soon...
>>>>>>> c015c81203decf61030b3116cb32634be3375f3c
