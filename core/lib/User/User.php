<?php

class User
{
    public function isAuthorized(){
        if(isset($_SESSION["login"])){
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
                $this->makeSession($login);
                return true;
            }else{
                return false;
            }
        }
    }

    private function hashPassword($password){
        return md5($password);
    }

    private function makeSession($login) {
        session_start();
        $_SESSION['login'] = $login;
    }
}