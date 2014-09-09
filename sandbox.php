<?php

/**
 * Just an easy place to play with
 * the class, obviously this would be
 * .gitignore'd.
 *
 * Feel free to tweak params and run this.
 */

require_once('autoload.php');

$animation = new Animation();

print_r($animation->animate(1, 'R.L.R.L.R.L'));