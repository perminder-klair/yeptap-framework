<?php

namespace yeptap\helpers;

class Html
{
    /**
     * Shortens url using TinyUrl
     *
     * @param $data
     * @return mixed
     */
    function shortenUrls($data)
    {
        $data = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', array(get_class($this), '_fetchTinyUrl'), $data);
        return $data;
    }

    /**
     * @param $url
     * @return string
     */
    private function _fetchTinyUrl($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url[0]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return '<a href="'.$data.'" target = "_blank" >'.$data.'</a>';
    }

    /**
     * Sanatize the data using mysql_real_escape_string
     *
     * @param $data
     * @return string
     */
    function sanitize($data)
    {
        return mysql_real_escape_string($data);
    }
}