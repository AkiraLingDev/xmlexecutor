<?php

class DB
{
    private $host = "localhost";
    private $login = "kizunedev";
    private $password = "vZ5iA0dG5hqU1f";
    public $connect;

    public function __construct(){
        $this->connect = mysqli_connect($this->host, $this->login, $this->password, "xmlexecutor_db");
    }

}