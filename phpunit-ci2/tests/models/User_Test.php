<?php

class User_Test extends PHPUnit_Framework_TestCase 
{
    private $CI;

    public function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->database('testing');

        $this->CI->load->model('user_model');
    }
    
    public function testUserCreation()
    {
        $user = new User();
        $user->user_name = 'Jose Bonifacio';
        $user->user_email = 'jose@bow.org';
        $user->user_password = '12345';

        $result = $this->CI->user_model->create_user($user);

        $this->assertTrue($result);
    }

    public function testUserLogin() 
    {
        $login = 'jose@bow.org';
        $password = '12345';

        $result = $this->CI->user_model->check_login($login, $password);

        $this->assertTrue($result);
    }
}