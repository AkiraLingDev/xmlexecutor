<?php

class DB
{
    private $host = "localhost";
    private $login = "root";
    private $password = "";

    public function __construct(){
        $connect = mysqli_connect($this->host, $this->login, $this->password, "xmlexecutor_db");
        return $connect;
    }

//    public function getBy
}