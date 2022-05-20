<?php

class User
{
    public $login;
    public $id;

    public function getLogin(){
        return $this->login;
    }

    public function getId(){
        global $DB;
        $sql = "SELECT id FROM `users` WHERE `login` = '".$this->login."'";
        $dbres = mysqli_query($DB->connect, $sql);
        $resAr = mysqli_fetch_array($dbres);
        if (!empty($resAr['id'])){
            return $resAr['id'];
        }else{
            return false;
        }
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['login']);
        return true;
    }

    public function isAuthorized(){
        if(isset($_SESSION["login"])){
            $this->login = $_SESSION["login"];
            return true;
        }else{
            return false;
        }
    }

    public function checkAuth($login, $password){
        global $DB;
        if (!empty($login) && !empty($password)){
            $sql = "SELECT * FROM `users` WHERE `login` = '".$login."' AND `password` = '".$this->hashPassword($password)."'";
            $dbres = mysqli_query($DB->connect, $sql);
            $resAr = mysqli_fetch_array($dbres);
            if (!empty($resAr['id'])){
                $this->auth($login, $resAr['id']);
                return true;
            }else{
                return false;
            }
        }
    }

    private function hashPassword($password){
        return md5($password);
    }

    private function auth($login, $id) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $id;
        $this->login = $login;
        $this->id = $id;
    }
}