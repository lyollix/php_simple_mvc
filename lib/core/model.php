<?php

class Model
{
    public $db;

    function __construct() {
        $this->db = $this->db ?: new PDO('sqlite:/home/lyollix/tasks.db');
    }
}
