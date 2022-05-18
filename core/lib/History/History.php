<?php

class History
{
    public function addRecord($url, $ok, $err){
        global $DB;
        global $USER;
        if (!empty($url)) {
            $sql = "INSERT INTO `history`(`url`, `date`, `ok`, `error`, `user_id`) VALUES ('".$url."','".time()."','".$ok."','".$err."','".$USER->getId()."')";
            $dbres = mysqli_query($DB->connect, $sql);
            if ($dbres){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}