<?php

class DB
{
    private $host = "localhost";
    private $login = "root";
    private $password = "";
    public $connect;

    public function __construct(){
        $this->connect = mysqli_connect($this->host, $this->login, $this->password, "xmlexecutor_db");
    }

}