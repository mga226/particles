<?php
require_once (__DIR__ . '/../autoload.php');

class AnimationTest extends PHPUnit_Framework_TestCase
{
    
    var $animation;
    
    public function setUp() {
        $this->animation = new Animation();
    }
    
    public function tearDown() {
        unset($this->animation);
    }
    
    /**
     * Given the rigorous nature of the specs,
     * what better way to test than just using the
     * cases provided there?
     */
    
    public function testExample0WorksAsSpecified() {
        $this->assertEquals(
            $this->animation->animate(2, '..R....'), 
            array(
                '..X....',
                '....X..',
                '......X',
                '.......'
            )
        );
    }
    
    public function testExample1WorksAsSpecified() {
        $this->assertEquals(
            $this->animation->animate(3, 'RR..LRL'), 
            array(
                "XX..XXX", 
                ".X.XX..", 
                "X.....X", 
                ".......")
            );
    }
    
    public function testExample2WorksAsSpecified() {
        $this->assertEquals(
            $this->animation->animate(2, "LRLR.LRLR"), 
            array(
                "XXXX.XXXX", 
                "X..X.X..X", 
                ".X.X.X.X.", 
                ".X.....X.", 
                ".........")
            );
    }
    
    public function testExample3WorksAsSpecified() {
        $this->assertEquals(
            $this->animation->animate(10, "RLRLRLRLRL"), 
            array(
                "XXXXXXXXXX", 
                "..........")
            );
    }
    
    public function testExample4WorksAsSpecified() {
        $this->assertEquals(
            $this->animation->animate(1, '...'), 
            array(
                '...',)
            );
    }
    
    public function testExample5WorksAsSpecified() {
        $this->assertEquals(
            $this->animation->animate(1, 'LRRL.LR.LRR.R.LRRL.'), 
            array(
                "XXXX.XX.XXX.X.XXXX.", 
                "..XXX..X..XX.X..XX.", 
                ".X.XX.X.X..XX.XX.XX", 
                "X.X.XX...X.XXXXX..X", 
                ".X..XXX...X..XX.X..", 
                "X..X..XX.X.XX.XX.X.", 
                "..X....XX..XX..XX.X", 
                ".X.....XXXX..X..XX.",
                "X.....X..XX...X..XX", 
                ".....X..X.XX...X..X", 
                "....X..X...XX...X..", 
                "...X..X.....XX...X.", 
                "..X..X.......XX...X", 
                ".X..X.........XX...", 
                "X..X...........XX..", 
                "..X.............XX.", 
                ".X...............XX", 
                "X.................X", 
                "..................."));
    }
}
