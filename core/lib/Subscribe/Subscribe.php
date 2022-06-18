<?php

class Subscribe
{
    public static function add($url, $period)
    {
        if (!empty($url) && !empty($period)) {
            global $USER;
            global $DB;
            $next_start = time() + ($period * 3600);
            $sql = "INSERT INTO `subscribes`(`url`, `period`, `next_start`, `user_id`) VALUES ('" . $url . "','" . $period . "','" . $next_start . "','" . $USER->getId() . "')";
            $dbres = mysqli_query($DB->connect, $sql);
            if ($dbres) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function getList()
    {
        global $DB;
        global $USER;
        if ($USER->getId() > 0) {
            $sql = "SELECT * FROM `subscribes` WHERE `user_id` = '".$USER->getId()."'";
            $dbres = mysqli_query($DB->connect, $sql);
            while ($resAr = mysqli_fetch_array($dbres, 1)) {
                $result[] = $resAr;
            }
            return $result;
        }else{
            return false;
        }
    }

    public static function delete($id)
    {
        if (!empty($id)) {
            global $DB;
            $sql = "DELETE FROM `subscribes` WHERE `subscribes`.`id` = {$id}";
            $dbres = mysqli_query($DB->connect, $sql);
            if ($dbres) {
                return true;
            } else {
                return false;
            }
        }
    }
}