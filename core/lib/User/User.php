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
}