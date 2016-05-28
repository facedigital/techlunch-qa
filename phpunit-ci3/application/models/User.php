<?php

class User {
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;

    public function __construct($user_name, $user_email, $user_password) {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
    }
}
