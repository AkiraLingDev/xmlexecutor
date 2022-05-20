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

    }
}