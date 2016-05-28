<?php

require_once APPPATH . 'models/User.php';

class User_model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
    }

    public function get_user_by_email($user_email)
    {
        $this->db->where('user_email', $user_email);
        $query = $this->db->get('users');
        if ($query->num_rows()) {
            return $query->row('User');
        }

        return FALSE;
    }

    public function create_user(User $user) 
    {
        $check_user = $this->get_user_by_email($user->user_email);

        $user->user_password = sha1($user->user_password);

        if ($check_user) {
            throw new Exception('User e-mail ['.$user->user_email.'] already taken, please use another.');
        }

        return $this->db->insert('users', (array) $user);
    }

    public function check_login($login, $password)
    {
        $user = $this->get_user_by_email($login);

        if (!empty($user->user_password) && $user->user_password == sha1($password)) {
            return TRUE;
        }

        return FALSE;
    }
}