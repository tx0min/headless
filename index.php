<?php

$url= get_option('redirect_url');


if($url){
    // 301 Moved Permanently
    header("Location: $url",TRUE,301);
}