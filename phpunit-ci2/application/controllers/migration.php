<?php

class Migration extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->input->is_cli_request()) {
            show_error('You don\'t have permission for this action');
        }

        $this->load->library('migration');
    }

    public function index()
    {
        $this->current();
    }

    public function current()
    {
        if ( ! $this->migration->current())
        {
            echo 'WARNING: ' . $this->migration->error_string() . PHP_EOL;
        } else
        {
            echo 'SUCCESS: Migration(s) done'.PHP_EOL;
        }
    }

    public function latest()
    {
        if ( ! $this->migration->latest())
        {
            echo 'WARNING: ' . $this->migration->error_string() . PHP_EOL;
        } else
        {
            echo 'SUCCESS: Migration(s) done'.PHP_EOL;
        }
    }
}