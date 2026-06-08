<?php
require_once 'db/Database.php';

class Feature1
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function someMethod()
    {
        return $this->db->connect();
    }
}
