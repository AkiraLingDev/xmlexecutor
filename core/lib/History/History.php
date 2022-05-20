<?php

class History
{
    public static function addRecord($url, $status){
        global $DB;
        global $USER;
        if (!empty($url)) {
            $sql = "INSERT INTO `history`(`url`, `date`, `ok`, `error`, `user_id`) VALUES ('".$url."','".date('Y-m-d H:i:s')."','".$status['OK']."','".$status['ERR']."','".$USER->getId()."')";
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

    public static function getList() {
        global $DB;
        global $USER;
        if ($USER->getId() > 0) {
            $sql = "SELECT * FROM `history` WHERE `user_id` = '".$USER->getId()."'";
            $dbres = mysqli_query($DB->connect, $sql);
            while ($resAr = mysqli_fetch_array($dbres, 1)) {
                $result[] = $resAr;
            }
            return $result;
        }else{
            return false;
        }
    }
}