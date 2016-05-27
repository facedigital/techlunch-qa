<?php

class Post_Test extends PHPUnit_Framework_TestCase 
{
    private $CI;
    
    public function tearUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->database('testing');
    }

    public function testCountPosts()
    {
        $posts = [1,2];

        $this->assertEquals(1, count($posts));
    }
}