<?php

function test(){
    return "helper test";
}

function apiJsonReturn($array = []){
    return json_encode(array('data'=>$array));
}

function pre()
{
    echo (php_sapi_name() !== 'cli') ? '<pre>' : '';
    foreach(func_get_args() as $arg){
        echo preg_replace('#\n{2,}#', "\n", print_r($arg, true));
    }
    echo (php_sapi_name() !== 'cli') ? '</pre>' : '';exit();
}

?>