<?php
function dump($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function themeBase()
{
    return SITE_ROOT . 'assets/';
}