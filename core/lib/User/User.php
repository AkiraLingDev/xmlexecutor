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
        echo "auth checker";
        if (!empty($login) && !empty($password)){
            $sql = 'SELECT id from users WHERE `login` = `'.$login.'` AND `password` = `'.$this->hashPassword($password).'`';
            echo "pre DB";
            $dbres = mysqli_query($DB, $sql);
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