<?php

namespace yeptap\helpers;

class Yeptap
{
    /**
     * @return string
     */
    public static function themeBase()
    {
        return SITE_ROOT . 'assets/';
    }

    /**
     * Helper function to work out the base URL
     *
     * @return string the base url
     */
    public static function base_url()
    {
        global $config;
        if(isset($config['base_url']) && $config['base_url']) return $config['base_url'];

        $url = '';
        $request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
        $script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';
        if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');

        $protocol = Yeptap::get_protocol();
        return rtrim(str_replace($url, '', $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), '/');
    }

    /**
     * Tries to guess the server protocol. Used in base_url()
     *
     * @return string the current protocol
     */
    public static function get_protocol()
    {
        preg_match("|^HTTP[S]?|is",$_SERVER['SERVER_PROTOCOL'],$m);
        return strtolower($m[0]);
    }

    /**
     * Sanitize database inputs
     * @param $input
     * @return string
     */
    public static function sanitize($input) {
        if (is_array($input)) {
            foreach($input as $var=>$val) {
                $output[$var] = sanitize($val);
            }
        }
        else {
            if (get_magic_quotes_gpc()) {
                $input = stripslashes($input);
            }
            $input  = Yeptap::cleanInput($input);
            $output = mysql_real_escape_string($input);
        }
        return $output;
    }
    /**
     * @param $input
     * @return mixed
     */
    public static function cleanInput($input) {

        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        );

        $output = preg_replace($search, '', $input);
        return $output;
    }

    /**
     * Helper function to limit the words in a string
     *
     * @param string $string the given string
     * @param int $word_limit the number of words to limit to
     * @return string the limited string
     */

    public static function limit_words($string, $word_limit)
    {
        $words = explode(' ',$string);
        return trim(implode(' ', array_splice($words, 0, $word_limit))) .'...';
    }

    /**
     * Creates random string
     * default lenght is 8
     */
    public static function genRandomString($length=8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $size = strlen( $chars );
        $str='';
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;

    }

    /**
     * Converts to money format
     */
    public static function moneyFormat($amount) {
        setlocale(LC_MONETARY, 'en_GB.UTF-8');
        return money_format('%n', $amount);
    }

    /**
     * delete directory recursivly
     */
    public static function deleteDirectory($dir, $keepDir=false) {
        if (!file_exists($dir)) return true;
        if (!is_dir($dir)) return unlink($dir);
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
        }
        if($keepDir)
            return true;
        else
            return rmdir($dir);
    }

    /**
     * merges new Get into current url
     * use it as: url("/model/action", mergeGet($_GET, 'limit', '50'));
     */
    public static function mergeGet($get, $key, $value) {
        if (array_key_exists($key, $get)) {
            $get[$key]=$value;
        }
        $array = array_merge(array($key => $value), $get);

        return $array;
    }
}