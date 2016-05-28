<?php

class Migration_create_base extends CI_Migration
{
    public function up() 
    {
        $this->dbforge->add_field('user_id bigint(20) NOT NULL AUTO_INCREMENT');
        $this->dbforge->add_field('user_name varchar(255) DEFAULT NULL');
        $this->dbforge->add_field('user_email varchar(255) DEFAULT NULL');
        $this->dbforge->add_field('user_password varchar(255) DEFAULT NULL');

        $this->dbforge->add_key('user_id', TRUE);

        $this->dbforge->create_table('users', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('users');
    }
}