<?php
class Yeptap
{
    public static function dump($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public static function themeBase()
    {
        return SITE_ROOT . 'assets/';
    }
}