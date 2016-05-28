<?php

class CI_Tests extends PHPUnit_Framework_TestCase 
{
    public $CI = NULL;

    public function __construct() {
        $this->CI = & get_instance();
    }
}
