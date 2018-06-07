<?php

function my_asset($path, $secure = null){
    return asset(trim($path, '/'), $secure);
}