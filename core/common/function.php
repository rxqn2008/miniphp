<?php
function p($str)
{
    if(is_string($str)){
        echo '<pre style="border:1px solid #aaa">'.$str.'</pre>';
    }else{
        var_dump($str);
    }
}