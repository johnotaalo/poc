<?php

function my_asset($path, $secure = null){
    return asset(env('APP_URL') . '/' . trim($path, '/'), $secure);
}